<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actions = [
            ['action' => 'Started Survey', 'entity' => 'Survey'],
            ['action' => 'Answered Survey Question', 'entity' => 'Survey'],
            ['action' => 'Paused Survey', 'entity' => 'Survey'],
            ['action' => 'Completed Survey', 'entity' => 'Survey'],
            ['action' => 'Submitted Survey', 'entity' => 'Survey'],
            ['action' => 'Started Assessment', 'entity' => 'Assessment'],
            ['action' => 'Answered Assessment Question', 'entity' => 'Assessment'],
            ['action' => 'Saved Assessment Progress', 'entity' => 'Assessment'],
            ['action' => 'Completed Assessment', 'entity' => 'Assessment'],
            ['action' => 'Viewed Assessment Results', 'entity' => 'Assessment'],
            ['action' => 'User Logged In', 'entity' => 'User'],
            ['action' => 'Updated Profile', 'entity' => 'User'],
            ['action' => 'Changed Password', 'entity' => 'User'],
            ['action' => 'User Logged Out', 'entity' => 'User'],
            ['action' => 'Viewed Notification', 'entity' => 'User'],
        ];

        $logs_data = [];
        $users = User::all();
        $users->each(function ($user) use ($actions, &$logs_data) {
            for ($i = 0; $i < 10; $i++) {
                $random_action = $actions[array_rand($actions)];
                $logs_data[] = [
                    'action' => $random_action['action'],
                    'entity' => $random_action['entity'],
                    'details' => json_encode(['info' => 'Additional details for action']),
                    'user_id' => $user->id,
                    'created_at' => Carbon::now()->startOfMonth()->addDays(rand(1, 30)),
                ];
            }
        });

        ActivityLog::insert($logs_data);
    }
}
