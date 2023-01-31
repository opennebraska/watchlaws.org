<?php

namespace App\Console\Commands;

use App\Models\Body;
use App\Models\Committee;
use App\Models\LegiScan\Bill\History;
use App\Models\LegiScan\Bill\HistoryTimestamp;
use App\Models\State;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @codeCoverageIgnore
 */
class LegiScanDaemon extends Command
{
    protected $signature = 'legiscan:daemon
        {--s|skip : Skip importing the base LegiScan data}';

    protected $description = 'Regularly scheduled LegiScan import command';

    protected string $separator = '--------------------------------';

    public function handle()
    {
        $start = now();

        $this->importLegiScanData()
            ->translateStates()
            ->translateBodies()
            ->translateCommittees();
            // ->upsertBillHistoryTimestamps();

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

    // public function upsertBillHistoryTimestamps(): static
    // {
    //     $this->info('Upating Legislative Bill History Timestamps');

    //     $billHistory = History::all();

    //     $progress = $this->output->createProgressBar(count($billHistory));

    //     $progress->start();

    //     foreach ($billHistory as $record) {
    //         HistoryTimestamp::updateOrCreate(
    //             [
    //                 'bill_id'      => $record->bill_id,
    //                 'history_step' => $record->history_step,
    //             ],
    //             [
    //                 'bill_id'      => $record->bill_id,
    //                 'history_step' => $record->history_step,
    //             ],
    //         );

    //         $progress->advance();
    //     }

    //     $progress->finish();

    //     $this->info("\n" . $this->separator);

    //     return $this;
    // }

    protected function importLegiScanData(): static
    {
        if ($this->option('skip')) {
            $this->info('Skipping base import');

            return $this;
        }

        // Prepare command
        $mysqlConfig    = config('database.connections.mysql');
        $apiKey         = config('legiscan.api_key');
        $scriptFilepath = base_path('lib/legiscan/legiscand.php');
        $command        = sprintf(
            'HOST=%s PORT=%s NAME=%s USER=%s PASS=%s LEGISCAN_API_KEY=%s php %s',
            $mysqlConfig['host'],
            $mysqlConfig['port'],
            $mysqlConfig['database'],
            $mysqlConfig['username'],
            $mysqlConfig['password'],
            $apiKey,
            $scriptFilepath,
        );

        // Run command
        $this->info('Importing LegiScan data. This may take a minute.');
        while (@ob_end_flush());
        $process = popen($command, 'r');
        while (!feof($process)) {
            $this->info(fread($process, 4096));
            @flush();
        }
        Log::info('LegiScan import completed');
        $this->info('LegiScan import completed.');

        // Display separator before returning
        $this->info($this->separator);

        return $this;
    }
}
