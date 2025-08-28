@extends('master')

@section('title')
    Simple Polling App
@endsection

@section('main-content')
   <div class="max-w-2xl mx-auto px-4 py-6">
        @if ($polls->isEmpty())
            <p class="text-gray-500 text-lg font-medium text-center">No polls available at the moment.</p>
        @else
            <div class="grid grid-cols-1 gap-6">
                @foreach ($polls as $poll)
                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold mb-2">{{ $poll->question }}</h2>
                            <p class="text-sm text-gray-500 mb-2">
                                {{ $poll->options->count() }} options available
                            </p>
                        </div>
                        <form action="{{ route('poll.destroy', $poll->id) }}" method="POST">
                            <div class="mt-2 flex justify-start space-x-2">
                                <a href="{{ route('poll.show', $poll->id) }}" 
                                class="px-3 py-1 rounded-lg border border-gray-300 hover:border-black text-sm transition shadow">
                                    View & Vote
                                </a>
                                <button type="button" onclick="openDeleteModal({{ $poll->id }}, '{{ addslashes($poll->question) }}')" 
                                class="px-3 py-1 rounded-lg border border-gray-300 hover:border-red-500 hover:text-red-500 text-sm transition shadow">
                                Delete
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div id="deleteModal" class="fixed inset-0 backdrop-blur-sm z-[9999] hidden items-center justify-center">
      <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm text-center">
        <h2 class="text-lg font-semibold mb-2">Delete Poll</h2>
        <p class="text-gray-600 text-sm mb-4">Are you sure you want to delete <span id="pollTitle" class="font-medium"></span>?</p>
        <form id="deleteForm" method="POST" class="flex justify-center gap-3">
          @csrf
          @method('DELETE')
          <button type="button" onclick="closeDeleteModal()" 
                  class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium hover:border-black transition shadow">
            Cancel
          </button>
          <button type="submit" 
                  class="px-4 py-2 rounded-lg border border-gray-300 hover:border-red-500 hover:text-red-500 text-sm transition shadow">
            Delete
          </button>
        </form>
      </div>
    </div>
@endsection

@push('addon-script')
  <script>
    function openDeleteModal(pollId, pollTitle) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const titleSpan = document.getElementById('pollTitle');

        form.action = '/poll/' + pollId;
        titleSpan.textContent = pollTitle;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
  </script>
@endpush