<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hero = [
            [
                'heading' => 'Welcome To Teaching Factory SMKS AL ITTIHAD',
                'subheading' => 'We are team of talented students making IT Solutions for your Bussiness',
                'background' => 'hero-bg/uMwlC17nyN5y5v5PM1G6ltDcO6mR6zffj5ZNs1Xj.jpg',
            ],
        ];
        foreach ($hero as $data) {
            HeroSection::create($data);
        }
    }
}
