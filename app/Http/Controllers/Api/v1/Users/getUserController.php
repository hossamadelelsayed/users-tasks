<?php

namespace App\Http\Controllers\Api\v1\Users;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityLogResource;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Traits\ApiResponses;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class getUserController extends Controller
{
    use ApiResponses;

    public function __construct(protected UserService $userService)
    {
    }

    /**
     * @param integer $id
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(int $id, Request $request): JsonResponse
    {
        try {
            $result = $this->userService->getUserStatistics($id);
            $statistics = $result->getTaskStatistics();
            $logs = $result->getLogs();
            return $this->success([
                'user' => new UserResource($result->getUser()),
                'top_assessment' => new TaskResource($result->getTopAssessment()),
                'top_survey' => new TaskResource($result->getTopSurvey()),
                'statistics' => $statistics->toArray(),
                'last_activity' => $result->getLastActivityLog(),
                'logs' =>  $logs->groupBy(function ($item) {
                    return Carbon::parse($item->created_at)->toDateString();
                })
            ], 'User found successfully');
        } catch (NotFoundException $e) {
            return $this->not_found('User not found');
        } catch (\Exception $e) {
            return $this->internal_error($e->getMessage());
        }
    }
}
