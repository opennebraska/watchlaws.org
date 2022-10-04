<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $file_path = app('env') === 'testing' ? 'legiscan.sqlite.sql' : 'lib/legiscan/schema-mysql.sql';

        DB::unprepared(file_get_contents(base_path($file_path)));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ls_bill');
        Schema::dropIfExists('ls_bill_amendment');
        Schema::dropIfExists('ls_bill_calendar');
        Schema::dropIfExists('ls_bill_history');
        Schema::dropIfExists('ls_bill_progress');
        Schema::dropIfExists('ls_bill_reason');
        Schema::dropIfExists('ls_bill_referral');
        Schema::dropIfExists('ls_bill_sast');
        Schema::dropIfExists('ls_bill_sponsor');
        Schema::dropIfExists('ls_bill_subject');
        Schema::dropIfExists('ls_bill_supplement');
        Schema::dropIfExists('ls_bill_text');
        Schema::dropIfExists('ls_bill_vote');
        Schema::dropIfExists('ls_bill_vote_detail');
        Schema::dropIfExists('ls_body');
        Schema::dropIfExists('ls_committee');
        Schema::dropIfExists('ls_event_type');
        Schema::dropIfExists('ls_ignore');
        Schema::dropIfExists('ls_mime_type');
        Schema::dropIfExists('ls_monitor');
        Schema::dropIfExists('ls_party');
        Schema::dropIfExists('ls_people');
        Schema::dropIfExists('ls_progress');
        Schema::dropIfExists('ls_reason');
        Schema::dropIfExists('ls_role');
        Schema::dropIfExists('ls_sast_type');
        Schema::dropIfExists('ls_session');
        Schema::dropIfExists('ls_signal');
        Schema::dropIfExists('ls_sponsor_type');
        Schema::dropIfExists('ls_stance');
        Schema::dropIfExists('ls_state');
        Schema::dropIfExists('ls_subject');
        Schema::dropIfExists('ls_supplement_type');
        Schema::dropIfExists('ls_text_type');
        Schema::dropIfExists('ls_type');
        Schema::dropIfExists('ls_variable');
        Schema::dropIfExists('ls_vote');
    }
};
