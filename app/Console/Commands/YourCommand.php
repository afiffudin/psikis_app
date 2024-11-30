<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class YourCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'your:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deskripsi singkat tentang command Anda';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Your command is working!');
        return Command::SUCCESS;
    }
}
