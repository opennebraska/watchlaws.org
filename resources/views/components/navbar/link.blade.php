<li class="mr-3">

    @if ($active)

        <a class="inline-block text-white no-underline py-2 px-4" href="{{ $href }}">{{ $slot }}</a>

    @else

        <a class="inline-block text-gray-400 no-underline hover:text-gray-100 hover:underline py-2 px-4" href="{{ $href }}">{{ $slot }}</a>

    @endif

</li>
