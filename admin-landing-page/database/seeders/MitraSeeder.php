<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mitra;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mitra = [
            [
                'logo' => 'mitra-logos/32CPKKgtjfpiGblgAbLuk1yyZpk04h8hO47goz4v.png',
                'order' => 0,
            ],
            [
                'logo' => 'mitra-logos/DyC11evfJ5loAN5LCwNmiAH0o35R0g0nAU2Iy9BN.png',
                'order' => 1,
            ],
        ];
        foreach ($mitra as $data) {
            Mitra::create($data);
        }
    }
}
