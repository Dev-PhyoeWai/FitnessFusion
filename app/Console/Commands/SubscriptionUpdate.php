<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use Illuminate\Support\Carbon;

class SubscriptionUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:subscription-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Users Subscription Status Update';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentDate = Carbon::now();
        $allUsers = User::whereNotNull('subscription_id')->get();

        foreach ($allUsers as $user) {
            $userDate = Carbon::parse($user->created_at);
            $monthsDifference = $userDate->diffInMonths($currentDate);

            if ($monthsDifference > 0) {
                $user->update(['subscription_id' => NULL]);
            }

            \Log::info("User ID: {$user->id}, Months Difference: {$monthsDifference}");
        }
    }
}
