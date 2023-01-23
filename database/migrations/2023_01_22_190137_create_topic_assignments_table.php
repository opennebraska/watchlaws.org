<?php

use App\Models\Group\Workspace\Topic;
use App\Models\LegiScan\Bill;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Topic::class);
            $table->morphs('topicable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_assignments');
    }
};
