<?php

namespace Database\Seeders;

use App\Models\Assessment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assessment_names = [
            'Math Test',
            'English Literature Test',
            'Science Test',
            'History Exam',
            'Geography Quiz',
            'Art Appreciation Test',
            'Physics Exam',
            'Chemistry Quiz',
            'Biology Test',
            'Computer Science Exam',
            'Music Theory Test',
            'Philosophy Quiz',
            'Economics Test',
            'Political Science Exam',
            'Psychology Test',
            'Sociology Quiz',
            'Anthropology Test',
            'Engineering Exam',
            'Medical Science Quiz',
            'Law Test'
        ];

        $assessments_data = [];
        foreach ($assessment_names as $name) {
            $assessments_data[] = Assessment::factory()->make([
                'name' => $name
            ])->toArray();
        }

        Assessment::insert($assessments_data);
    }
}
