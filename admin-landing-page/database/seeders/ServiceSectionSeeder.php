<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = [
            [
                'icon' => 'bi bi-briefcase',
                'title' => 'Web Apps',
                'description' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            ],
            [
                'icon' => 'bi bi-briefcase',
                'title' => 'Mobile Apps',
                'description' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            ],
            [
                'icon' => 'bi bi-briefcase',
                'title' => 'Desktop Apps',
                'description' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            ],
            [
                'icon' => 'bi bi-briefcase',
                'title' => 'IT Consultation',
                'description' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            ],
        ];
        foreach ($service as $data) {
            Service::create($data);
        }
    }
}
