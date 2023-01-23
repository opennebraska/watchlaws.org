<?php

use App\Models\Bookmark;
use App\Models\Group\Workspace;
use Illuminate\Support\Facades\DB;
use App\Models\Group\Workspace\Topic;
use Illuminate\Database\Migrations\Migration;
use App\Models\Group\Workspace\Topic\Section;
use App\Models\Group\Workspace\Topic\Assignment;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * BEFORE
         *      - Workspaces were used as the topic section
         *      - Bookmarks were tying topics to bills
         *      - Bookmarks were associated with the topic
         *
         * After:
         *      - Topics have their own sections
         *      - Topics have their own pivot table for topic-bill assignments
         *      - Bookmarks are associated with the workspace
         */
        DB::transaction(function () {
            $this->convertToUsingTopicSections()
                 ->assignTopicsDirectly()
                 ->scopeBookmarksToWorkspaces();
        });
    }

    private function convertToUsingTopicSections()
    {
        // Topics should have their own sections... and NOT rely on the workspace for this
        Topic::all()->each(function ($topic) {
            $section = Section::updateOrCreate([
                'workspace_id' => $topic->workspace_id,
                'name'         => $topic->workspace->name,
            ]);

            $topic->section_id = $section->id;
            $topic->save();
        });

        return $this;
    }

    private function assignTopicsDirectly()
    {
        // Topics should use their own pivot table for assignments... and NOT reply on bookmarks for this
        Bookmark::all()->each(function ($bookmark) {
            Assignment::updateOrCreate([
                'topic_id'       => $bookmark->scope_id,
                'topicable_type' => $bookmark->bookmarkable_type,
                'topicable_id'   => $bookmark->bookmarkable_id,
            ]);
        });

        return $this;
    }

    private function scopeBookmarksToWorkspaces()
    {
        Bookmark::all()->each(function ($bookmark) {
            try {
                $bookmark->scope_type = Workspace::class;
                $bookmark->scope_id   = Topic::find($bookmark->scope_id)->workspace->id;
                $bookmark->save();
            } catch (Exception $e) {
                $bookmark->delete();
            }
        });

        return $this;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Not doing, since this is still initial alpha version
    }
};
