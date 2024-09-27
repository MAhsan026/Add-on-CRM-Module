<?php

namespace App\Console\Commands;

use App\Mail\BeforeFollowupReminder as MailBeforeFollowupReminder;
use App\Models\User;
use App\Models\ReminderAdmin as ReminderAdminModel;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class BeforeFollowupReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:before';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Set the timezone
        date_default_timezone_set('Asia/Karachi'); // Ya jo bhi aapka local timezone hai
        Carbon::setToStringFormat('Y-m-d H:i:s');

        $now = Carbon::now();
        $this->info("Current time: " . $now->toDateTimeString());
        $this->info("App Timezone: " . config('app.timezone'));
        $dbTimezone = DB::select("SELECT @@session.time_zone AS db_timezone")[0]->db_timezone;
        $this->info("DB Timezone: " . $dbTimezone);

        // Use Eloquent query
        $reminders = ReminderAdminModel::where('reminder_date', '<=', $now)
            ->where('reminder_type', 'before_follow_up_due_date')
            ->where('sent', false)
            ->get();

        $this->info("SQL Query: " . ReminderAdminModel::where('reminder_date', '<=', $now)
            ->where('reminder_type', 'before_follow_up_due_date')
            ->where('sent', false)
            ->toSql());
        $this->info("Query Bindings: " . json_encode([
            $now->toDateTimeString(),
            'before_follow_up_due_date',
            false
        ]));

        $this->info("Number of reminders found: " . $reminders->count());

        if ($reminders->isEmpty()) {
            $this->info('No reminders found');

            // Debug: Show all reminders
            $allReminders = ReminderAdminModel::all();
            $this->info("All reminders in database:");
            foreach ($allReminders as $r) {
                $this->info("ID: {$r->id}, Date: {$r->reminder_date}, Type: {$r->reminder_type}, Sent: {$r->sent}");
            }

            return;
        }

        $sentCount = 0;
        foreach ($reminders as $reminder) {
            $this->info("Processing reminder ID: {$reminder->id}, Date: {$reminder->reminder_date}");
            if ($this->sendReminder($reminder)) {
                $reminder->sent = true;
                $reminder->save();
                $sentCount++;
            }
        }
        $this->info("Reminders sent: " . $sentCount);
    }

    private function sendReminder($reminder)
    {
        $admin = User::find($reminder->admin_id);
        if (!$admin) {
            $this->error("Admin not found for reminder ID: {$reminder->id}");
            return false;
        }
        try {
            Mail::to($admin->email)->send(new MailBeforeFollowupReminder($admin, $reminder, [], []));
            $this->info("Reminder sent to admin: {$admin->email} for reminder ID: {$reminder->id}");
            return true;
        } catch (\Exception $e) {
            $this->error("Failed to send reminder to admin: {$admin->email} for reminder ID: {$reminder->id}. Error: {$e->getMessage()}");
            return false;
        }
    }
}
