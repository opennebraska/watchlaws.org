<?php

use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\User;
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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();

            $table->morphs('scope');
            $table->morphs('taggable');

            // $table->string('type')->nullable();  // I don't remember why I was adding a type
            $table->string('text');

            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->timestamps();

            $table->unique(
                ['scope_type', 'scope_id', 'taggable_type', 'taggable_id', 'text'/*'type'*/],
                'tags_scope_taggable_text_unique',
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
        Schema::dropIfExists('tags');
    }
};
