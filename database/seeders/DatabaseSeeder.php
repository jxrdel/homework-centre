<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(StudentSeeder::class);

        $users = [
            [
                'FirstName' => 'Jardel',
                'LastName' => 'Regis',
                'Username' => 'jardel.regis',
                'Email' => 'jardel.regis@health.gov.tt',
                'IsAdmin' => true,
                'IsSuperAdmin' => true,
                
            ],
            [
                'FirstName' => 'Kizzy',
                'LastName' => 'Villaroel',
                'Username' => 'kizzy.villaroel',
                'Email' =>  'kizzy.villaroel@health.gov.tt',
                'IsAdmin' => true,
                'IsSuperAdmin' => false,
                
            ],
            [
                'FirstName' => 'Kia',
                'LastName' => 'Boldan',
                'Username' => 'kia.boldan',
                'Email' => 'kia.boldan@health.gov.tt',  
                'IsAdmin' => true,
                'IsSuperAdmin' => false,
                
            ]
        ];

        User::insert($users);
    }
}
