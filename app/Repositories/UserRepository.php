<?php

namespace App\Repositories;

use App\Enums\Users\TaskType;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserInterface
{
    /**
     * @param integer $user_id
     * @return User
     */
    public function get(int $user_id): ?User
    {
        try {
            return User::find($user_id);
        } catch (\Exception $e) {
            Log::error('UserRepository [get]  ' . $e->getMessage());
        }
    }

    /**
     * @param integer $user_id
     * @return Collection
     */
    public function getStatisticsPerTask(int $user_id): Collection
    {
        try {
            return DB::table('users_tasks')
                ->select(
                    'task_type',
                    DB::raw('SUM(score) as score_sum'),
                    DB::raw('SUM(progress) as progress_sum'),
                    DB::raw('COUNT(*) as count')
                )
                ->where('user_id', $user_id)
                ->groupBy('task_type')
                ->get();
        } catch (\Exception $e) {
            Log::error('UserRepository [getUserTaskStatistics]  ' . $e->getMessage());
        }
    }

    /**
     * @param integer $user_id
     * @return \stdClass|null
     */
    public function getTopAssessment(int $user_id):  ?\stdClass
    {
        try {
            return DB::table('users_tasks as ut')
                ->join('assessments as a', 'ut.task_id', '=', 'a.id')
                ->select(
                    'a.id as task_id',
                    'a.name as task_name',
                    'a.score as task_score',
                    'ut.score as user_score',
                    DB::raw('(ut.score / a.score * 100) as percentage_score')
                )
                ->where('ut.user_id', $user_id)
                ->where('ut.task_type', TaskType::ASSESSMENT)
                ->orderBy('percentage_score', 'desc')
                ->limit(1)
                ->first();
        } catch (\Exception $e) {
            Log::error('UserRepository [getTopAssessment]  ' . $e->getMessage());
        }
    }

    /**
     * @param integer $user_id
     * @return \stdClass|null
     */
    public function getTopSurvey(int $user_id): ?\stdClass
    {
        try {
            return  DB::table('users_tasks as ut')
            ->join('surveys as s', 'ut.task_id', '=', 's.id')
            ->select(
                's.id as task_id',
                's.name as task_name',
                's.score as task_score',
                'ut.score as user_score',
                DB::raw('(ut.score / s.score * 100) as percentage_score')
            )
            ->where('ut.user_id', $user_id)
            ->where('ut.task_type', TaskType::SURVEYS)
            ->orderBy('percentage_score', 'desc')
            ->limit(1)
            ->first();
        } catch (\Exception $e) {
            Log::error('UserRepository [getTopSurvey]  ' . $e->getMessage());
        }
    }
}
