<div class="flex items-baseline mb-6">

    <nav class="ml-3">
        <a href="{{ route('groups.workspaces.show', [$group, $workspace]) }}" class="hover:underline text-gray-500">bookmarks</a>
        <a href="{{ route('groups.workspaces.bill-search.show', [$group, $workspace]) }}" class="hover:underline text-gray-500 ml-2">search</a>
    </nav>
</div>
