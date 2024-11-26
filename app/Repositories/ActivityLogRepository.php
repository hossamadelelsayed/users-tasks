<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ActivityLogRepository implements ActivityLogInterface
{
    /**
     * @param integer $user_id
     * @return Collection|null
     */
    public function getActivityLogs(int $user_id): ?Collection
    {
        try {
            return DB::table('activity_logs')
            ->select('action', 'entity', 'created_at')
            ->where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        } catch (\Exception $e) {
            Log::error('ActivityLogRepository [getActivityLogs]  ' . $e->getMessage());
        }
    }
}
