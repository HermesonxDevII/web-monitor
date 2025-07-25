<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\{ EndpointCheckJob };
use App\Models\{ Endpoint };

class EndpointsCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:endpoints-check-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all endpoints';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Endpoint::where('next_check', '<=', now())->each(function ($endpoint) {
            EndpointCheckJob::dispatch($endpoint);
        });
    }
}
