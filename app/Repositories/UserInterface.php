<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserInterface
{
    public function get(int $user_id): ?User;

    public function getStatisticsPerTask(int $user_id): Collection;

    public function getTopAssessment(int $user_id): ?\stdClass;

    public function getTopSurvey(int $user_id): ?\stdClass;

}
