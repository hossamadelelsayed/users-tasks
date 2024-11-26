<?php

namespace App\DTO\Users;

use App\Models\User;
use Illuminate\Support\Collection;
use stdClass;

class UserDto
{
    public function __construct(
        private User $user,
        private ?TaskStatisticsDto $task_statistics,
        private ?stdClass $top_assessment,
        private ?stdClass $top_survey,
        private ?Collection $activity_logs,
    ) {
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return stdClass|null
     */
    public function getTopAssessment(): ?stdClass
    {
        return $this->top_assessment;
    }

    /**
     * @return stdClass|null
     */
    public function getTopSurvey(): ?stdClass
    {
        return $this->top_survey;
    }

    /**
     * @return TaskStatisticsDto|null
     */
    public function getTaskStatistics(): ?TaskStatisticsDto
    {
        return $this->task_statistics;
    }

    /**
     * @return stdClass|null
     */
    public function getLastActivityLog(): ?stdClass
    {
        return $this->activity_logs->first();
    }

    /**
     * @return Collection|null
     */
    public function getLogs(): ?Collection
    {
        return $this->activity_logs;
    }
}
