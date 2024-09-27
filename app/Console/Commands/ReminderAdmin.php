<?php

namespace App\Console\Commands;

use App\Mail\DueDateReminder;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\ReminderAdmin as ReminderAdminModel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ReminderAdminEmail;

class ReminderAdmin extends Command
{
    protected $signature = 'reminder:admin';
    protected $description = 'Send reminders to admins';

    public function handle()
    {
        $now = Carbon::now();
        $followup_time = $now->copy()->addMinutes(30);

        $this->info("Current time: " . $now->toDateTimeString());
        $this->info("Followup time: " . $followup_time->toDateTimeString());

        $reminders = ReminderAdminModel::where('reminder_date', '>', $now)
            ->where('reminder_date', '<=', $followup_time)
            ->where('reminder_type', 'follow_up_due_date')
            ->where('sent', false)
            ->get();

        $this->info("Number of reminders found: " . $reminders->count());

        if ($reminders->isEmpty()) {
            $this->info('No reminders found for the specified time range');
            return;
        }

        foreach ($reminders as $reminder) {
            $this->info("Reminder found: ID {$reminder->id}, Date: {$reminder->reminder_date}");
            $this->sendReminder($reminder);

            // Update the sent status
            $reminder->sent = true;
            $reminder->save();
        }

        $this->info('Reminders processed: ' . $reminders->count());
    }

    private function sendReminder($reminder)
    {
        $admin = User::find($reminder->admin_id);

        if (!$admin) {
            $this->error("Admin not found for reminder ID: {$reminder->id}");
            return;
        }

        try {
            Mail::to($admin->email)->send(new DueDateReminder($admin, $reminder, [], []));
            $reminder->sent = true;
            $reminder->save();
            $this->info("Reminder sent to admin: {$admin->email} for reminder ID: {$reminder->id}");
        } catch (\Exception $e) {
            $this->error("Failed to send reminder to admin: {$admin->email}. Error: {$e->getMessage()}");
        }
    }
}
