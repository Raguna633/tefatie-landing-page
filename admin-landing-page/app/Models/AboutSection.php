<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutSection extends Model
{
    use HasFactory;
    protected $fillable = ['title','icon','description'];
}
