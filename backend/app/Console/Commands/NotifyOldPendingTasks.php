<?php

namespace App\Console\Commands;

use App\Mail\OldPendingTasksNotification;
use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyOldPendingTasks extends Command
{
    protected $signature = 'tasks:notify-old-pending';
    protected $description = 'Notify about tasks that are pending for more than 7 days';

    public function handle()
    {
        $oldPendingTasks = Task::query()
            ->where('status', 'pending')
            ->where('created_at', '<=', now()->subDays(7))
            ->get();

        if ($oldPendingTasks->isNotEmpty()) {
            Mail::to(config('mail.admin_email'))
                ->send(new OldPendingTasksNotification($oldPendingTasks->toArray()));

            $this->info('Notification sent for ' . $oldPendingTasks->count() . ' tasks');
        } else {
            $this->info('No old pending tasks found');
        }
    }
}
