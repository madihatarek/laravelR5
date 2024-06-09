<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\City;
use App\Models\Client;
use App\Models\Student;
use App\Models\Courses;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
       
        // StudentCourses::factory(20)->create();
        City::factory(20)->create();
        Client::factory(10)->create();
        // Courses::factory(20)->create();
        // Student::factory(20)->create();
       
        $students = Student::factory(20)->create();
        $courses = Courses::factory(20)->create();
        $students->each(function ($student) use ($courses) {
            $student->courses()->attach($courses->random(rand(1, 5))->pluck('id'));
        });
        // ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
