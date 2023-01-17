<div>

    {{-- Group info --}}
    <div class="flex items-baseline mb-5">
        <h1 class="font-bold text-lg mr-3">{{ $group->name }}</h1>
        <nav>
            <a href="{{ route('group.about.show', compact('group')) }}" class="hover:underline text-gray-500">about</a>
        </nav>
    </div>

    {{-- Workspaces --}}
    <h2 class="mb-0.5">Pick a workspace:</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
        @foreach ($group->children()->workspaces()->get() as $workspace)

            <div>
                <a href="{{ route('group.show', [$workspace, 'year'=>request()->query('year')]) }}"
                    class="underline"
                    >{{ $workspace->name }}</a>
            </div>

        @endforeach
    </div>

</div>
