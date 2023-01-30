<form wire:submit.prevent="update">

    <h4 class="mb-2 text-sm font-light text-gray-800">
        Assign Topics
    </h4>

    <div class="sm:columns-2 lg:columns-3 xl:columns-4 text-sm">
        @foreach ($workspace->topicSections as $section)

            <div>
                <div class="inline-block mb-2">
                    <div class="font-medium mb-1">{{ $section->name }}</div>
                    <div>
                        @foreach ($section->topics as $topic)

                            <label class="block">
                                <input wire:model.defer="topicsAssigned" value="{{ $topic->id }}" type="checkbox" />
                                {{ $topic->name }}
                            </label>

                        @endforeach

                    </div>
                </div>
            </div>

        @endforeach
    </div>

    <div class="mt-3 pt-2 pb-3 border-t border-gray-400 text-sm text-center">

        <button
            type="submit"
            class="bg-green-200 border hover:bg-green-300 border-green-500 text-green-900 hover:text-black px-3 py-1 font-semibold rounded-md"
            >Update</button>

        <button
            type="button"
            wire:click="cancel"
            class="bg-gray-200 border hover:bg-gray-300 border-gray-500 text-gray-900 px-3 py-1 font-semibold rounded-md"
            >Cancel</button>

    </div>

</form>
