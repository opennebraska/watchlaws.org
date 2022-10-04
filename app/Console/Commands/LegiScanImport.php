<?php

namespace App\Console\Commands;

use App\Models\LegiScan\State;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @codeCoverageIgnore
 */
class LegiScanImport extends Command
{
    protected $signature = 'legiscan:import {--d|debug}';

    protected $description = 'Regularly scheduled LegiScan import command';

    protected string $separator = '--------------------------------';

    public function handle()
    {
        $start = now();

        $this->importLegiscanData()
            ->translateStates();

        $this->info('');
        $this->info(
            'Finished in ' . now()->diff($start)->format('%I:%S')
        );
        $this->info('');
    }

    protected function translateStates(): static
    {
        $this->info('Translating State Data');

        $states = DB::select('SELECT * FROM ls_state');

        $progress = $this->output->createProgressBar(count($states));

        $progress->start();

        foreach ($states as $state) {
            State::updateOrCreate(
                ['id' => $state->state_id],
                [
                    'id'           => $state->state_id,
                    'name'         => $state->state_name,
                    'abbreviation' => $state->state_abbr,
                    'biennium'     => $state->biennium,
                    'carry_over'   => $state->carry_over, 
                    'capitol'      => $state->capitol,
                    'latitude'     => $state->latitude,
                    'longitude'    => $state->longitude,
                ]
            );

            $progress->advance();
        }

        $progress->finish();

        $this->info("\n".$this->separator);

        return $this;
    }

    protected function importLegiscanData(): static
    {
        $mysqlConfig    = config('database.connections.mysql');
        $apiKey         = config('legiscan.api_key');
        $mailFrom       = config('mail.from.address');
        $debug          = $this->option('debug') ? '-d display_errors 0 -d error_reporting 5 ' : '';
        $scriptFilepath = base_path('lib/legiscan/legiscan-bulk.php');

        $command = sprintf(
            'HOST=%s PORT=%s NAME=%s USER=%s PASS=%s LEGISCAN_API_KEY=%s MAIL_FROM_ADDRESS=%s php %s%s --bulk --import --yes',
            $mysqlConfig['host'],
            $mysqlConfig['port'],
            $mysqlConfig['database'],
            $mysqlConfig['username'],
            $mysqlConfig['password'],
            $apiKey,
            $mailFrom,
            $debug,
            $scriptFilepath,
        );

        $this->info('Importing LegiScan data. This may take a minute.');
        
        exec($command);

        Log::info('LegiScan import completed');

        $this->info('LegiScan import completed.');
        $this->info($this->separator);

        return $this;
    }
}
