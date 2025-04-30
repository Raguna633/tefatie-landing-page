<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team = [
            [
                'name' => 'Abdul Muhith Faris Mussyafa',
                'position' => 'Programmer',
                'photo' => 'team-photos/V5D2KH7DBkEnIMbw1exJEnAlCBbx18pFO6uN78JQ.png',
            ],
            [
                'name' => 'Azhar Ardian',
                'position' => 'Programmer',
                'photo' => 'team-photos/V5D2KH7DBkEnIMbw1exJEnAlCBbx18pFO6uN78JQ.png',
            ],
            [
                'name' => 'Alif Ghea Yanuar',
                'position' => 'Programmer',
                'photo' => 'team-photos/V5D2KH7DBkEnIMbw1exJEnAlCBbx18pFO6uN78JQ.png',
            ],
            [
                'name' => 'Nawal Fadhilah',
                'position' => 'Programmer',
                'photo' => 'team-photos/V5D2KH7DBkEnIMbw1exJEnAlCBbx18pFO6uN78JQ.png',
            ],
            [
                'name' => 'Michail Ibnu Qolbi',
                'position' => 'Programmer',
                'photo' => 'team-photos/V5D2KH7DBkEnIMbw1exJEnAlCBbx18pFO6uN78JQ.png',
            ],
            [
                'name' => 'Restu Hadi Nugraha',
                'position' => 'Programmer',
                'photo' => 'team-photos/V5D2KH7DBkEnIMbw1exJEnAlCBbx18pFO6uN78JQ.png',
            ],
            [
                'name' => 'Rio Adrian Sidik',
                'position' => 'Programmer',
                'photo' => 'team-photos/V5D2KH7DBkEnIMbw1exJEnAlCBbx18pFO6uN78JQ.png',
            ],
            [
                'name' => 'Rizky Ramadhan',
                'position' => 'Programmer',
                'photo' => 'team-photos/V5D2KH7DBkEnIMbw1exJEnAlCBbx18pFO6uN78JQ.png',
            ],
        ];
        foreach ($team as $data) {
            TeamMember::create($data);
        }
    }
}
