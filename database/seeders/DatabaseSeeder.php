<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Material;
use App\Models\Program;
use App\Models\User;
use Database\Factories\CourseFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        User::factory(7)->create();

        // Create user as student with different password
        User::factory()->create([
            "email" => 'Tyreek.Kub7@yahoo.com',
            "password" => Hash::make("asdqwe123")
        ]);
        
        
        // Create user as instructor
        $instructor1 = User::factory()->instructorRole()->create([
            "email" => 'Kody_Harber@gmail.com',
            "password" => Hash::make("asdqwe123")
        ]);
        
        // Create user as instructor
        $instructor2 = User::factory()->instructorRole()->create([
            "email" => 'Giovanna_Hoppe@gmail.com',
            "password" => Hash::make("asdqwe123")
        ]);

        // Get Program Seeder
        $this->call([ProgramSeeder::class]);

        // Create 20 material that have random relationship with random course
        Material::factory(20)->recycle([
            // Create 12 course that have random relationship with program and one of the 2 instructor
            Course::factory(12)->recycle([
                $instructor1,
                $instructor2,
                Program::all()
            ])->create(),
        ])->create();
    }
}
