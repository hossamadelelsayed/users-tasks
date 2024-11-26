<?php

namespace App\Services;

use App\DTO\Users\TaskStatisticsDto;
use App\DTO\Users\UserDto;
use App\Enums\Users\TaskType;
use App\Exceptions\NotFoundException;
use App\Repositories\ActivityLogInterface;
use App\Repositories\UserInterface;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(
        protected ActivityLogInterface $activityLogRepository,
        protected UserInterface $userRepository
    ) {
    }

    /**
     * @param integer $user_id
     * @return UserDto
     */
    public function getUserStatistics(int $user_id): UserDto
    {
        $user = $this->userRepository->get($user_id);
        if(!$user) {
            throw new NotFoundException();
        }

        $top_assessment = $this->userRepository->getTopAssessment($user_id);
        $top_survey = $this->userRepository->getTopSurvey($user_id);

        $task_statistics = $this->userRepository->getStatisticsPerTask($user_id);
        $logs = $this->activityLogRepository->getActivityLogs($user_id);
        
        return new UserDto(
            user:$user,
            top_assessment:$top_assessment,
            top_survey:$top_survey,
            task_statistics:$this->populateTaskStatictics($task_statistics),
            activity_logs: $logs
        );

    }

    /**
     * @param Collection $task_statistics
     * @return TaskStatisticsDto
     */
    private function populateTaskStatictics(Collection $task_statistics): TaskStatisticsDto
    {
        $tasks_count = $task_statistics->sum('count');
        return new TaskStatisticsDto(
            tasks_score_average:$task_statistics->sum('score_sum') / $tasks_count,
            tasks_progress_average:$task_statistics->sum('progress_sum') / $tasks_count,
            assessments_count:$task_statistics->where('task_type', TaskType::ASSESSMENT)->sum('count'),
            surveys_count:$task_statistics->where('task_type', TaskType::SURVEYS)->sum('count'),
        );
    }
}
