<?php

namespace App\Enums\Users;

use App\Models\Assessment;
use App\Models\Survey;

class TaskType
{
    const ASSESSMENT = Assessment::class;
    const SURVEYS = Survey::class;
}