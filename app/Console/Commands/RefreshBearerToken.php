<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshBearerToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a request to the spotify api to get fresh access tokens';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
