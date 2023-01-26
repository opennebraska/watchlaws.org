<div class="flex">

    <div class="">

        {{-- Years --}}
        <form action="{{ route('groups.navigate.year.update', $group) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="year" id="year" onchange="this.form.submit()" class="border border-gray-400">
                @foreach (app(\App\Helpers\SessionYear::class)->getAll()->sortDesc() as $year)
                    <option value="{{ $year }}" {!! $year == $group->chosenYear() ? 'selected="selected"' : '' !!}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </form>

    </div>
    <div class="flex-grow">

        {{-- States --}}
        <form action="{{ route('groups.navigate.state.update', $group) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="state" id="state" onchange="this.form.submit()" class="border border-gray-400 ml-2">
                <option value="">ALL STATES</option>
                @foreach (config('enum.navigation_states') as $stateAbbr => $stateName)
                    <option value="{{ $stateAbbr }}" {!! $stateAbbr == ($group->chosenState()->abbreviation ?? null) ? 'selected="selected"' : '' !!}>
                        {{ $stateName }}
                    </option>
                @endforeach
            </select>
        </form>

    </div>
</div>
