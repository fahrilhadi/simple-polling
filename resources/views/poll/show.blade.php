@extends('master')

@section('title')
    Show and Vote | Simple Polling App
@endsection

@section('main-content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6">
            <h1 class="text-xl font-bold mb-4">{{ $poll->question }}</h1>

            {{-- Form Vote --}}
            <form id="voteForm">
                @csrf
                <input type="hidden" name="poll_id" value="{{ $poll->id }}">
                <div class="space-y-3">
                    @foreach ($poll->options as $option)
                        <label class="flex items-center space-x-3">
                            <input type="radio" name="option_id" value="{{ $option->id }}" class="h-4 w-4 accent-black">
                            <span>{{ $option->option_text }}</span>
                        </label>
                    @endforeach
                </div>
                <button type="submit" 
                    class="mt-4 px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
                    Submit Vote
                </button>
            </form>

            {{-- Results --}}
            <div id="results" class="mt-6 hidden">
                <h2 class="text-lg font-semibold mb-2">Results:</h2>
                <ul id="resultsList" class="space-y-2"></ul>
            </div>
        </div>
    </div>

    {{-- AJAX Script --}}
    <script>
        document.getElementById('voteForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("{{ route('poll.vote', $poll->id) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const resultsDiv = document.getElementById('results');
                    const resultsList = document.getElementById('resultsList');
                    resultsList.innerHTML = '';

                    data.results.forEach(opt => {
                        const li = document.createElement('li');
                        li.textContent = `${opt.text} — ${opt.votes} votes`;
                        resultsList.appendChild(li);
                    });

                    resultsDiv.classList.remove('hidden');
                }
            });
        });
    </script>
@endsection