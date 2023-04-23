<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendContactEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:work';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return $this->call('queue:work', [
            '--queue' => 'emails', // remove this if queue is default
            '--stop-when-empty' => null,
        ]);
    }
}
