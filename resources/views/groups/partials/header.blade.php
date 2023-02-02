
<div class="flex items-baseline mb-2">
    <h1 class="font-bold text-lg mr-3">
        {{ $group->name }}
    </h1>
    <nav>
        <a href="{{ route('groups.workspaces.index', $group) }}" class="hover:underline text-gray-500 ml-1">workspaces</a>
        <a href="{{ route('groups.members.index', $group) }}" class="hover:underline text-gray-500 ml-2">members</a>
        <a href="{{ route('groups.bookmarks.index', $group) }}" class="hover:underline text-gray-500 ml-2">all bookmarks</a>
        <a href="{{ route('groups.hearings.index', $group) }}" class="hover:underline text-gray-500 ml-2">all hearings</a>
    </nav>
</div>
