<?php

use App\Models\Bookmark;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Topic;
use App\Models\Workspace;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function()
        {
            $this->moveWorkspaces();

            Group::where('type', 'workspace')->delete();
            Group::where('type', 'topic')->delete();
        });
    }

    private function moveWorkspaces()
    {
        foreach (Group::where('type', 'workspace')->get() as $workspace_group)
        {
            // Move workspaces to their own table
            $workspace = Workspace::create([
                'group_id' => $workspace_group->parent_id,
                'name' => $workspace_group->name,
                'state_abbr' => $workspace_group->state_abbr,
                'description' => $workspace_group->description,
                'owner_id' => $workspace_group->owner_id,
                'created_by' => $workspace_group->created_by,
                'created_at' => $workspace_group->created_at,
                'updated_at' => $workspace_group->updated_at,
            ]);

            $this->repointBookmarkstoNewModels($workspace_group, $workspace);
            $this->moveTopics($workspace_group, $workspace);
        }
    }

    private function moveTopics($workspace_group, $workspace)
    {
        // Move topics to their own table
        foreach (Group::where([['type', 'topic'],['parent_id', $workspace_group->id]])->get() as $topic_group)
        {
            $topic = Topic::create([
                'workspace_id' => $workspace->id,
                'name' => $topic_group->name,
                'state_abbr' => $topic_group->state_abbr,
                'description' => $topic_group->description,
                'owner_id' => $topic_group->owner_id,
                'created_by' => $topic_group->created_by,
                'created_at' => $topic_group->created_at,
                'updated_at' => $topic_group->updated_at,
            ]);

            $this->repointBookmarkstoNewModels($topic_group, $topic);
        }
    }

    private function repointBookmarkstoNewModels($group, $scope)
    {
        // Point bookmarks
        Bookmark::where('scope_type', Group::class)
                ->where('scope_id', $group->id)
                ->update([
                    'scope_type' => get_class($scope),
                    'scope_id' => $scope->id
                ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
