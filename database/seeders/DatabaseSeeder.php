<?php

namespace Database\Seeders;

use App\Models\Assessment;
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
        $this->call([
            AssessmentSeeder::class,
            SurveySeeder::class,
            UserSeeder::class,
            ActivityLogSeeder::class,
        ]);
    }
}
