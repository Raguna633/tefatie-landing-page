<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'author_id',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    // Otomatis generate slug dari title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);

            // Cek jika slug sudah ada, tambahkan angka di belakang
            $originalSlug = $post->slug;
            $count = 1;

            while (static::where('slug', $post->slug)->exists()) {
                $post->slug = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title')) {
                $post->slug = Str::slug($post->title);

                // Cek jika slug sudah ada (kecuali untuk post ini sendiri)
                $originalSlug = $post->slug;
                $count = 1;

                while (static::where('slug', $post->slug)
                    ->where('id', '!=', $post->id)
                    ->exists()) {
                    $post->slug = $originalSlug . '-' . $count++;
                }
            }
        });
    }

    // Route key name untuk menggunakan slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relasi dengan author
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
