<div>
    @foreach ($session_years as $year)
        @php

            $query_string = Arr::query(
                collect(request()->query())
                    ->merge(['year' => $year])
                    ->all()
            );

        @endphp

        <a href="{{ url()->current() }}?{{ $query_string }}"
            class="underline mr-2"
            >{{ $year }}</a>

    @endforeach
</div>
