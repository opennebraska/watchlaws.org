<nav class="flex items-center justify-between flex-wrap bg-gray-900 p-6 w-full">

    {{-- Left --}}
    <div class="flex items-center flex-no-shrink text-gray-100 text-2xl mr-6">

        {{ $title }}

    </div>

    {{-- Burger --}}
    <div class="block lg:hidden">
        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-500 hover:text-gray-400 hover:border-gray-400">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
        </button>
    </div>

    {{-- Links --}}
    <div class="w-full flex-grow lg:flex6 lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">

            {{ $links }}

        </ul>
    </div>

</nav>
<script>
    // Burger icon toggle
    document.getElementById('nav-toggle').onclick = function(){
        document.getElementById("nav-content").classList.toggle("hidden");
    }
</script>
