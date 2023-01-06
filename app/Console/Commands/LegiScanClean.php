<?php

namespace App\Console\Commands;

use App\Models\Body;
use App\Models\Committee;
use App\Models\State;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

/**
 * @codeCoverageIgnore
 */
class LegiScanClean extends Command
{
    protected $signature = 'legiscan:clean';

    protected $description = 'Clean the LegiScan cache directory';

    protected string $separator = '--------------------------------';

    public function handle()
    {
        $start = now();

        $this->cleanLegiScanCache();

        $this->info('');
        $this->info(
            'Finished in ' . now()->diff($start)->format('%I:%S')
        );
        $this->info('');
    }

    protected function cleanLegiScanCache(): static
    {
        // Preparing command
        $mysqlConfig    = config('database.connections.mysql');
        // $apiKey         = config('legiscan.api_key');
        $scriptFilepath = base_path('lib/legiscan/legiscan-cli.php');
        $command = sprintf(
            'HOST=%s PORT=%s NAME=%s USER=%s PASS=%s php %s --clean',
            // 'HOST=%s PORT=%s NAME=%s USER=%s PASS=%s LEGISCAN_API_KEY=%s php %s %s%s--bulk --import --yes',
            $mysqlConfig['host'],
            $mysqlConfig['port'],
            $mysqlConfig['database'],
            $mysqlConfig['username'],
            $mysqlConfig['password'],
            // $apiKey,
            $scriptFilepath
        );

        // Running the operation
        $this->info('Cleaning LegiScan cache.');
        while (@ob_end_flush());
        $process = popen($command, 'r');
        while (!feof($process)) {
            $this->info(fread($process, 4096));
            @flush();
        }
        Log::info('LegiScan cache clean completed');
        $this->info('LegiScan cache clean completed.');

        // Separator before returning
        $this->info($this->separator);
        return $this;
    }
}
