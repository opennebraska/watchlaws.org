<?php

namespace App\Console\Commands;

use App\Models\Body;
use App\Models\State;
use App\Models\Committee;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

/**
 * @codeCoverageIgnore
 */
class LegiScanUpgrade extends Command
{
    protected $signature = 'legiscan:upgrade';

    protected $description = 'Run LegiScan upgrade script';

    protected string $separator = '--------------------------------';

    public function handle()
    {
        $start = now();

        $this->runLegiScanUpgrade();

        $this->info('');
        $this->info(
            'Finished in ' . now()->diff($start)->format('%I:%S')
        );
        $this->info('');
    }

    protected function runLegiScanUpgrade(): static
    {
        $this->info('Importing LegiScan data. This may take a minute.');

        $mysqlConfig    = config('database.connections.mysql');
        $apiKey         = config('legiscan.api_key');
        $scriptFilepath = base_path('lib/legiscan/upgrade.php');

        $command = sprintf(
            'HOST=%s PORT=%s NAME=%s USER=%s PASS=%s LEGISCAN_API_KEY=%s php %s --bulk --import --yes',
            $mysqlConfig['host'],
            $mysqlConfig['port'],
            $mysqlConfig['database'],
            $mysqlConfig['username'],
            $mysqlConfig['password'],
            $apiKey,
            $scriptFilepath
        );

        while (@ob_end_flush());

        $process = popen($command, 'r');

        while (!feof($process)) {
            $this->info(fread($process, 4096));

            @flush();
        }

        Log::info('LegiScan upgrade completed');

        $this->info('LegiScan upgrade completed.');
        $this->info($this->separator);

        return $this;
    }
}
