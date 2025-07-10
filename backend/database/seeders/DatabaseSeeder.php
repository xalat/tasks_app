<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Project::factory()
            ->count(5)
            ->create()
            ->each(function ($project) {
                $project->tasks()->saveMany(
                    Task::factory()
                        ->count(fake()->numberBetween(3, 7))
                        ->make()
                );
            });

    }
}
