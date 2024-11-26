<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $survey_names = [
            'Customer Satisfaction Survey',
            'Employee Engagement Survey',
            'Market Research Survey',
            'Product Feedback Survey',
            'Website Usability Survey',
            'Brand Awareness Survey',
            'Event Feedback Survey',
            'Employee Performance Survey',
            'Customer Service Survey',
            'Audience Insights Survey',
            'NPS Survey',
            'Health and Wellness Survey',
            'Consumer Behavior Survey',
            'Service Quality Survey',
            'Client Satisfaction Survey',
            'Tech Adoption Survey',
            'Retail Experience Survey',
            'Global Trends Survey',
            'Online Shopping Survey',
            'Community Engagement Survey'
        ];

        $surveys_data = [];
        foreach ($survey_names as $name) {
            $surveys_data[] = Survey::factory()->make([
                'name' => $name,
            ])->toArray();
        }

        Survey::insert($surveys_data);
    }
}
