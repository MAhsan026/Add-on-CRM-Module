<?php

namespace App\Console\Commands;

use App\Jobs\SendFollowupEmail;
use App\Models\Followup;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckFollowups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'followups:check';

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
        $now = Carbon::now();
        $fifteenMinutesFromNow = $now->copy()->addMinutes(15);
        Log::info('Command is running. Checking followups between ' . $now . ' and ' . $fifteenMinutesFromNow);

        // Log the current timezone
        Log::info('Current timezone: ' . config('app.timezone'));

        // Get all followups and log their dates
        $allFollowups = Followup::all();
        Log::info('All followups:');
        foreach ($allFollowups as $followup) {
            Log::info("ID: {$followup->id}, Date: {$followup->date_time}");
        }

        $upcomingFollowups = Followup::whereBetween('date_time', [$now, $fifteenMinutesFromNow])->get();

        Log::info('Upcoming followups count: ' . $upcomingFollowups->count());
        Log::info('SQL query: ' . Followup::whereBetween('date_time', [$now, $fifteenMinutesFromNow])->toSql());
        Log::info('Query bindings: ' . json_encode(Followup::whereBetween('date_time', [$now, $fifteenMinutesFromNow])->getBindings()));

        if ($upcomingFollowups->isEmpty()) {
            Log::info('No upcoming followups found.');
        } else {
            foreach ($upcomingFollowups as $followup) {
                Log::info('Followup found: ' . $followup->id . ' - ' . $followup->date_time);
                SendFollowupEmail::dispatch($followup);
            }
        }

        $this->info('Followup check completed.');
    }
}
