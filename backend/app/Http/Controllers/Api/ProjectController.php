<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $projects = Project::with('tasks')
            ->orderBy('created_at', 'desc')
            ->get();

        return ProjectResource::collection($projects);
    }

    public function show(Project $project): ProjectResource
    {
        return new ProjectResource(
            $project->load('tasks')
        );
    }

    public function store(Request $request): ProjectResource
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project = Project::create($validated);

        return new ProjectResource($project->load('tasks'));
    }

    public function update(Request $request, Project $project): ProjectResource
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project->update($validated);

        if ($request->has('task')) {
            $taskData = $request->validate([
                'task.title' => 'required|string|max:255',
                'task.status' => 'nullable|string|in:pending,in_progress,completed',
            ]);

            $project->tasks()->create($taskData['task']);
        }

        return new ProjectResource($project->load('tasks'));
    }

}
