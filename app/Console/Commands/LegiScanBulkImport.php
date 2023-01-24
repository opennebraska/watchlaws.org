<?php

namespace App\Console\Commands;

use App\Models\Body;
use App\Models\Committee;
use App\Models\State;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @codeCoverageIgnore
 */
class LegiScanBulkImport extends Command
{
    protected $signature = 'legiscan:bulk
        {--d|debug : Bet debug output from the LegiScan base import}
        {--w|wordy : Use verbose output from the LegiScan base import}
        {--m|migrate : Do a fresh set of migrations for the database before import}
        {--s|skip : Skip importing the base LegiScan data}';

    protected $description = 'Imports LegiScan datasets that are updated weekly';

    protected string $separator = '--------------------------------';

    public function handle()
    {
        $start = now();

        if ($this->option('migrate')) {
            Artisan::call('migrate:fresh --drop-views');
            $this->info(Artisan::output());
        }

        $this->importLegiscanData()
            ->translateStates()
            ->translateBodies()
            ->translateCommittees();

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

        $this->info("\n" . $this->separator);

        return $this;
    }

    public function translateBodies(): static
    {
        $this->info('Translating Legislative Body Data');

        $bodies = DB::select('SELECT * FROM ls_body');

        $progress = $this->output->createProgressBar(count($bodies));

        $progress->start();

        foreach ($bodies as $body) {
            Body::updateOrCreate(
                ['id' => $body->body_id],
                [
                    'id'                => $body->body_id,
                    'state_id'          => $body->state_id,
                    'name'              => $body->body_name,
                    'abbreviation'      => $body->body_short,
                    'role'              => $body->body_role_name,
                    'role_abbreviation' => $body->body_role_abbr,
                ]
            );

            $progress->advance();
        }

        $progress->finish();

        $this->info("\n" . $this->separator);

        return $this;
    }

    public function translateCommittees(): static
    {
        $this->info('Translating Legislative Committee Data');

        $committees = DB::select('SELECT * FROM ls_committee');

        $progress = $this->output->createProgressBar(count($committees));

        $progress->start();

        foreach ($committees as $committee) {
            Committee::updateOrCreate(
                ['id' => $committee->committee_id],
                [
                    'id'      => $committee->committee_id,
                    'name'    => $committee->committee_name,
                    'body_id' => $committee->committee_body_id,
                ]
            );

            $progress->advance();
        }

        $progress->finish();

        $this->info("\n" . $this->separator);

        return $this;
    }

    protected function importLegiscanData(): static
    {
        if ($this->option('skip')) {
            $this->info('Skipping base import');

            return $this;
        }

        $mysqlConfig    = config('database.connections.mysql');
        $apiKey         = config('legiscan.api_key');
        $debug          = $this->option('debug') ? '--debug ' : '';
        $verbose        = $this->option('wordy') ? '--verbose ' : ' ';
        $scriptFilepath = base_path('lib/legiscan/legiscan-bulk.php');

        $command = sprintf(
            'HOST=%s PORT=%s NAME=%s USER=%s PASS=%s LEGISCAN_API_KEY=%s php %s %s%s--bulk --import --yes',
            $mysqlConfig['host'],
            $mysqlConfig['port'],
            $mysqlConfig['database'],
            $mysqlConfig['username'],
            $mysqlConfig['password'],
            $apiKey,
            $scriptFilepath,
            $debug,
            $verbose
        );

        $this->info('Importing LegiScan data. This may take a minute.');

        while (@ob_end_flush());

        $process = popen($command, 'r');

        while (!feof($process)) {
            $this->info(fread($process, 4096));

            @flush();
        }

        Log::info('LegiScan import completed');

        $this->info('LegiScan import completed.');
        $this->info($this->separator);

        return $this;
    }
}
