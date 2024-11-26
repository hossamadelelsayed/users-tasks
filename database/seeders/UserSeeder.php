<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(100)->create();

        $assessments = Assessment::all();
        $surveys = Survey::all();

        $users->each(function ($user) use ($assessments, $surveys) {
            $selected_assessments = $assessments->random(5);
            $selected_surveys = $surveys->random(5);

            $assessment_pivot_data = $selected_assessments->mapWithKeys(function ($assessment) {
                return [
                    $assessment->id => [
                        'score' => rand(1, $assessment->score),
                        'progress' => rand(1, 100),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                ];
            });

            $survey_pivot_data = $selected_surveys->mapWithKeys(function ($survey) {
                return [
                    $survey->id => [
                        'score' => rand(1, $survey->score),
                        'progress' => rand(1, 100),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                ];
            });

            $user->assessments()->attach($assessment_pivot_data);
            $user->surveys()->attach($survey_pivot_data);
        });
    }
}
