<?php

use App\Models\Bookmark;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\Group\Workspace\Topic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            $this->moveWorkspaces();

            Group::where('type', 'workspace')->delete();
            Group::where('type', 'topic')->delete();
        });
    }

    private function moveWorkspaces()
    {
        foreach (Group::where('type', 'workspace')->get() as $workspaceGroup) {
            // Move workspaces to their own table
            $workspace = Workspace::create([
                'group_id'    => $workspaceGroup->parent_id,
                'name'        => $workspaceGroup->name,
                'state_abbr'  => $workspaceGroup->state_abbr,
                'description' => $workspaceGroup->description,
                'owner_id'    => $workspaceGroup->owner_id,
                'created_by'  => $workspaceGroup->created_by,
                'created_at'  => $workspaceGroup->created_at,
                'updated_at'  => $workspaceGroup->updated_at,
            ]);

            $this->repointBookmarkstoNewModels($workspaceGroup, $workspace);
            $this->moveTopics($workspaceGroup, $workspace);
        }
    }

    private function moveTopics($workspaceGroup, $workspace)
    {
        // Move topics to their own table
        foreach (Group::where([['type', 'topic'], ['parent_id', $workspaceGroup->id]])->get() as $topicGroup) {
            $topic = Topic::create([
                'workspace_id' => $workspace->id,
                'name'         => $topicGroup->name,
                'state_abbr'   => $topicGroup->state_abbr,
                'description'  => $topicGroup->description,
                'owner_id'     => $topicGroup->owner_id,
                'created_by'   => $topicGroup->created_by,
                'created_at'   => $topicGroup->created_at,
                'updated_at'   => $topicGroup->updated_at,
            ]);

            $this->repointBookmarkstoNewModels($topicGroup, $topic);
        }
    }

    private function repointBookmarkstoNewModels($group, $scope)
    {
        // Point bookmarks
        Bookmark::where('scope_type', Group::class)
                ->where('scope_id', $group->id)
                ->update([
                    'scope_type' => get_class($scope),
                    'scope_id'   => $scope->id,
                ]);
    }
};
