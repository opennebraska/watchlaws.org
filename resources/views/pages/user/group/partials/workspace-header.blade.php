<div>

    <h1 class="mb-5 font-bold text-lg">{{ $workspace->name }}</h1>

    {{-- Topics --}}
    <h2 class="mb-0.5">Pick a topic:</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
        @foreach ($workspace->children()->topics()->get() as $topic)

            <div>
                <a href="{{ route('group.show', [$topic]) }}"
                    class="underline"
                    >{{ $topic->name }}</a>
            </div>

        @endforeach
    </div>

</div>
