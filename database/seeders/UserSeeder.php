<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(7)->create();

        User::factory()->create([
            "email" => 'Tyreek.Kub7@yahoo.com',
            "password" => Hash::make("asdqwe123")
        ]);

        User::factory()->instructorRole()->create([
            "email" => 'Kody_Harber@gmail.com',
            "password" => Hash::make("asdqwe123")
        ]);

        User::factory()->instructorRole()->create([
            "email" => 'Giovanna_Hoppe@gmail.com',
            "password" => Hash::make("asdqwe123")
        ]);
    }
}
