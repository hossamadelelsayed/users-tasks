<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface ActivityLogInterface
{
    public function getActivityLogs(int $user_id) : ?Collection;
}
