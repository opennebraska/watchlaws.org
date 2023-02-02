<div class="flex items-baseline">

    <h2 class="text-xl">
        {{ $workspace->name }}
    </h2>

    <nav class="ml-4">

        <a href="{{ route('groups.workspaces.bookmarks.index', [$group, $workspace]) }}" class="hover:underline text-gray-500 ml-2">bookmarks</a>
        <a href="{{ route('groups.workspaces.bill-search.show', [$group, $workspace]) }}" class="hover:underline text-gray-500 ml-2">search</a>
        <a href="{{ route('groups.workspaces.hearings.index', [$group, $workspace]) }}" class="hover:underline text-gray-500 ml-2">hearings</a>

    </nav>
</div>
