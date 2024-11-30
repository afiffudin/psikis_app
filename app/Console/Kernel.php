<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            try {
                \Log::info('Callback started!');
                // Tambahkan logika Anda di sini
                // Misalnya, kode berikut:
                \App\Models\User::all()->each(function ($user) {
                    $user->notify(new \App\Notifications\SessionReminder());
                });
                \Log::info('Callback completed successfully!');
            } catch (\Exception $e) {
                \Log::error('Callback failed: ' . $e->getMessage());
            }
            
            \Log::info('Scheduler is running!');
            $users = \App\Models\User::all();
    
            foreach ($users as $user) {
                $user->notify(new \App\Notifications\SessionReminder());
            }
        })->everyMinute(); 

        $schedule->command('your:command')->everyMinute()->onSuccess(function () {
            \Log::info('Command executed successfully!');
        })->onFailure(function () {
            \Log::error('Command execution failed!');
        });
    }

    /**
     * Register the commands for the application.
     */
    // protected function commands(): void
    // {
    //     $this->load(__DIR__.'/Commands');

    //     require base_path('routes/console.php');
    // }
    protected $commands = [
        \App\Console\Commands\YourCommand::class,
    ];
}
