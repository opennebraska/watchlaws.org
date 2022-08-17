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
        $command .= "php $script_filepath ";
        $command .= "--bulk ";
        $command .= "--import ";
        $command .= "--yes ";

        exec($command);

        Log::info('LegiScan import completed');
    }
}
