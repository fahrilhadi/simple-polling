<header class="w-full">
  <div class="max-w-2xl mx-auto px-4 py-4 flex justify-between items-center">
    <h1 class="text-xl font-semibold">Simple Polling</h1>

    <div class="flex items-center space-x-2">
        @if (request()->routeIs('poll.create','poll.show'))
            <a href="{{ route('poll.index') }}" 
                class="px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
                Back
            </a>
        @else
            <a href="{{ route('poll.create') }}" 
                class="px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
                + Add Poll
            </a>
        @endif
    </div>
  </div>
</header>