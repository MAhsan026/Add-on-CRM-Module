<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Followup;
use Illuminate\Support\Facades\Mail;
use App\Mail\FollowupReminder;
use Illuminate\Support\Facades\Log;

class SendFollowupEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $followup;

    public function __construct($followup)
    {
        $this->followup = $followup;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info($this->followup->email);
        Mail::to($this->followup->email)->send(new FollowupReminder($this->followup));
        Mail::to($this->followup->contact->email)->send(new FollowupReminder($this->followup));
    }
}
