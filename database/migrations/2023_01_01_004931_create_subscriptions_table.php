<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {

            $table->id();

            $table->morphs('scope');
            $table->morphs('subscribable');
            $table->string('type')->nullable();
            $table->timestamp('notified_at')->nullable();

            $table->timestamps();

            // Indexes
            $table->unique(
                ['scope_type', 'scope_id', 'subscribable_type', 'subscribable_id'],
                'subscriptions_scope_subscribable_unique',
            );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
