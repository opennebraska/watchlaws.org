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
        $script_filepath = base_path('lib/legiscan/legiscan-bulk.php');

        $command = '';

        $command .= ' HOST='.config('database.connections.mysql.host');
        $command .= ' PORT='.config('database.connections.mysql.port');
        $command .= ' USER='.config('database.connections.mysql.username');
        $command .= ' PASS='.config('database.connections.mysql.password');
        $command .= ' NAME='.config('database.connections.mysql.database');
        $command .= ' ';

        $command .= 'php '.$script_filepath;
        $command .= ' --bulk';
        $command .= ' --import';
        $command .= ' --yes';

        // echo $command;
        exec($command);

        Log::info('LegiScan import completed');
    }
}
