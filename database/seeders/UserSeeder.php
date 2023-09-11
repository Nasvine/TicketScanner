<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name'           => "NASSARA",
            'last_name'            => "Kévine",
            'email'                => "vinenassara@gmail.com",
            'password'             => bcrypt("vinenassara@gmail.com"),
            'role_id'              => 1,
        ]);

        $user = User::create([
            'first_name'           => "Visiteur 1",
            'last_name'            => "Visite",
            'email'                => "visitor1@gmail.com",
            'password'             => bcrypt("visitor1@gmail.com"),
            'role_id'              => 2,
        ]);
    }
}
