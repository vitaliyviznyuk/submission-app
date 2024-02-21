<?php

namespace App\Events;

use App\Models\Submission;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Submission $submission;

    /**
     * Create a new event instance.
     *
     * @param Submission $submission
     * @return void
     */
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }
}
