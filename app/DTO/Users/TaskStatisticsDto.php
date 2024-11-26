<?php

namespace App\DTO\Users;

class TaskStatisticsDto
{
    public function __construct(
        private int|float $tasks_score_average,
        private int|float $tasks_progress_average,
        private int $assessments_count,
        private int $surveys_count
    ) {
    }


    /**
     * @return integer|float
     */
    public function tasksScoreAverage(): int|float
    {
        return round($this->tasks_score_average, 2);
    }

    /**
     * @return integer|float
     */
    public function tasksProgressAverage(): int|float
    {
        return round($this->tasks_progress_average, 2);
    }

    /**
     * @return integer
     */
    public function assessmentsCount(): int
    {
        return $this->assessments_count;
    }

    /**
     * @return integer
     */
    public function surveysCount(): int
    {
        return $this->surveys_count;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'tasks_score_average' => $this->tasksScoreAverage(),
            'tasks_progress_average' => $this->tasksProgressAverage(),
            'assessments_count' => $this->assessmentsCount(),
            'surveys_count' => $this->surveysCount()
        ];
    }
}
