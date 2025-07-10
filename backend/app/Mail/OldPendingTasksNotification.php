<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OldPendingTasksNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $tasks)
    {
    }

    public function build()
    {
        return $this->markdown('emails.tasks.pending')
            ->subject('Tasks Pending for More Than 7 Days');
    }
}
