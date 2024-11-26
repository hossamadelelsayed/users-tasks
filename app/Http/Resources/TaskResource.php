<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->task_name,
            'score' => $this->user_score . ' / ' . $this->task_score,
            'percentage' => round($this->percentage_score, 2) . ' %',
        ];

    }
}
