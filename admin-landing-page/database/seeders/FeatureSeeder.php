<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feature = [
            [
                'title' => 'Corporis temporibus maiores provident',
                'description' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.',
                'btn_text' => 'Get Started',
            ],
            [
                'title' => 'Corporis temporibus maiores provident',
                'description' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.',
                'btn_text' => 'Get Started 22',
            ],
        ];
        foreach ($feature as $data) {
            Feature::create($data);
        }
    }
}
