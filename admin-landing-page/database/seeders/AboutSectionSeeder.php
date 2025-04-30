<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = [
            [
                'title' => 'Ducimus rerum libero reprehenderit cumque',
                'icon' => 'bi bi-buildings',
                'description' => 'Ipsa sint sit. Quis ducimus tempore dolores impedit et dolor cumque alias maxime. Enim reiciendis minus et rerum hic non. Dicta quas cum quia maiores iure. Quidem nulla qui assumenda incidunt voluptatem tempora deleniti soluta.',
            ],
            [
                'title' => 'Ducimus rerum libero reprehenderit cumque',
                'icon' => 'bi bi-buildings',
                'description' => 'Ipsa sint sit. Quis ducimus tempore dolores impedit et dolor cumque alias maxime. Enim reiciendis minus et rerum hic non. Dicta quas cum quia maiores iure. Quidem nulla qui assumenda incidunt voluptatem tempora deleniti soluta.',
            ],
            [
                'title' => 'Ducimus rerum libero reprehenderit cumque',
                'icon' => 'bi bi-buildings',
                'description' => 'Ipsa sint sit. Quis ducimus tempore dolores impedit et dolor cumque alias maxime. Enim reiciendis minus et rerum hic non. Dicta quas cum quia maiores iure. Quidem nulla qui assumenda incidunt voluptatem tempora deleniti soluta.',
            ]
        ];
        foreach ($about as $data) {
            AboutSection::create($data);
        }
    }
}
