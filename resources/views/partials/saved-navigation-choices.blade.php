<div class="flex">

    <div class="bg-gray-200 px-4 py-4">

        {{-- Years --}}
        <form action="{{ route('groups.navigate.year.update', $group) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="year" id="year" onchange="this.form.submit()">
                @foreach (legislativeSessionHelper()->validYears() as $year)
                    <option value="{{ $year }}" {!! $year == $group->chosenYear() ? 'selected="selected"' : '' !!}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </form>

    </div>
    <div class="bg-gray-200 px-4 py-4 flex-grow">

        {{-- States --}}
        <form action="{{ route('groups.navigate.state.update', $group) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="state" id="state" onchange="this.form.submit()">
                <option value="">ALL STATES</option>
                @foreach (config('enum.legiscan_states') as $stateAbbr => $stateName)
                    <option value="{{ $stateAbbr }}" {!! $stateAbbr == ($group->chosenState()->abbreviation ?? null) ? 'selected="selected"' : '' !!}>
                        {{ $stateName }}
                    </option>
                @endforeach
            </select>
        </form>

    </div>

</div>
