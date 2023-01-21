<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImportLegiScanSchemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sqlFilepath = base_path('lib/legiscan/schema-mysql.sql');

        $host     = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');

        $command = '';
        $command .= 'mysql ';
        $command .= "-h $host ";
        $command .= "-u $username ";
        $command .= "--password=$password ";
        $command .= "--database=$database ";
        $command .= "< $sqlFilepath";

        exec($command);

        Log::info('LegiScan schema imported');
    }
}
