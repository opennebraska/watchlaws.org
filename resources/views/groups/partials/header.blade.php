
<div class="flex items-baseline mb-2">
    <h1 class="font-bold text-lg mr-3">
        <a href="{{ route('groups.show', $group) }}" class="hover:underline">{{ $group->name }}</a>
    </h1>
    <nav>
        <a href="{{ route('groups.show', $group) }}" class="hover:underline text-gray-500 ml-1">group</a>
        <a href="{{ route('groups.members.index', $group) }}" class="hover:underline text-gray-500 ml-2">members</a>
    </nav>
</div>
