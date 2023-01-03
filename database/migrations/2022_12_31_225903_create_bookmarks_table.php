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
        Schema::create('bookmarks', function (Blueprint $table) {

            $table->id();

            $table->morphs('scope');
            $table->morphs('bookmarkable');

            $table->string('reason')->nullable();
            $table->boolean('pin_to_top')->default(false);
            $table->boolean('direction');
            $table->text('type')->nullable();

            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->timestamps();

            // Indexes
            $table->unique(
                ['scope_type', 'scope_id', 'bookmarkable_type', 'bookmarkable_id'],
                'bookmarks_scope_bookmarkable_unique',
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
        Schema::dropIfExists('bookmarks');
    }
};
