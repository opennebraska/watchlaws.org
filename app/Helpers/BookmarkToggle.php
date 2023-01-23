<?php

namespace App\Helpers;

use App\Models\Bookmark;

class BookmarkToggle
{
    public function getBookmark($bookmarkable, $scope)
    {
        return Bookmark::query()
            ->where([
                ['scope_type', get_class($scope)],
                ['scope_id', $scope->id],
                ['bookmarkable_type', get_class($bookmarkable)],
                ['bookmarkable_id', $bookmarkable->id],
            ])
            ->first();
    }

    public function clear($bookmarkable, $scope)
    {
        // Remove bookmark for bill and scope
        $this->getBookmark($bookmarkable, $scope)->delete();
    }

    public function up($bookmarkable, $scope)
    {
        // Add bookmark "up" for bill and scope
        return Bookmark::create([
            'scope_type'        => get_class($scope),
            'scope_id'          => $scope->id,
            'bookmarkable_type' => get_class($bookmarkable),
            'bookmarkable_id'   => $bookmarkable->id,
            'direction'         => true,
            'created_by'        => auth()->user()->id,
        ]);
    }

    public function down($bookmarkable, $scope)
    {
        // Add bookmark "down" for bill and scope
        return Bookmark::create([
            'scope_type'        => get_class($scope),
            'scope_id'          => $scope->id,
            'bookmarkable_type' => get_class($bookmarkable),
            'bookmarkable_id'   => $bookmarkable->id,
            'direction'         => false,
            'created_by'        => auth()->user()->id,
        ]);
    }
}
