<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LegiScanImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'legiscan:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regularly scheduled LegiScan import command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // RUN THIS COMMAND USING "SAIL" (WHEN IN LOCAL MODE) !!!!!!!!!!!!

        $script_filepath = base_path('lib/legiscan/legiscan-bulk.php');

        $command = '';

        $command .= ' HOST='.config('database.connections.mysql.host');
        $command .= ' PORT='.config('database.connections.mysql.port');
        $command .= ' NAME='.config('database.connections.mysql.database');
        $command .= ' USER='.config('database.connections.mysql.username');
        $command .= ' PASS='.config('database.connections.mysql.password');

        $command .= ' LEGISCAN_API_KEY='.config('legiscan.api_key');
        $command .= ' MAIL_FROM_ADDRESS='.config('mail.from.address');

        $command .= ' php';
        // $command .= ' -d display_errors 0';
        // $command .= ' -d error_reporting 5';  // Same as (E_ERROR | E_PARSE); see https://www.php.net/manual/en/errorfunc.constants.php
        $command .= ' ' . $script_filepath;
        $command .= ' --bulk';
        $command .= ' --import';
        $command .= ' --yes';

        // echo $command;
        exec($command);

        Log::info('LegiScan import completed');
    }
}
