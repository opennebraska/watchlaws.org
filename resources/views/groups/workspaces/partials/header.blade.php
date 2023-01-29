<div class="flex items-baseline">

    <h2 class="text-xl">
        <a href="{{ route('groups.workspaces.show', [$group, $workspace]) }}" class="hover:underline">{{ $workspace->name }}</a>
    </h2>

    <nav class="ml-4">

        <a
            href="{{ route('groups.workspaces.show', [$group, $workspace]) }}"
            class="hover:underline text-gray-500"
            >bookmarks</a>

        <a
            href="{{ route('groups.workspaces.bill-search.show', [$group, $workspace]) }}"
            class="hover:underline text-gray-500 ml-2"
            >search</a>

        {{-- <a
            href="{{ route('groups.workspaces.topic-sections.index', [$group, $workspace]) }}"
            class="hover:underline text-gray-500 ml-2"
            >topics</a> --}}

    </nav>
</div>
