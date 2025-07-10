<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tasks' => TaskResource::collection($this->whenLoaded('tasks')),
            'tasks_count' => $this->whenLoaded('tasks', function() {
                return $this->tasks->count();
            }),
        ];
    }
}
