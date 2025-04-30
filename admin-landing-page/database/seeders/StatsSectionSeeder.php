<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stats;

class StatsSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'count' => 33,
                'label' => 'Projects',
            ],
            [
                'count' => 8,
                'label' => 'Member',
            ],
        ];
        foreach ($stats as $data) {
            Stats::create($data);
        }
    }
}
