@extends('master')

@section('title')
    Create | Simple Polling App
@endsection

@section('main-content')
    <div class="w-full">
        <div class="max-w-2xl mx-auto px-4 py-12">
          <div class="p-6 border border-gray-200 rounded-xl shadow bg-white">
            <form action="{{ route('poll.store') }}" method="POST" class="space-y-4">
                @csrf
                {{-- Question --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Question</label>
                    <input type="text" name="question" value="{{ old('question') }}" autocomplete="off"
                        class="@error('question') is-invalid @enderror w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black">
                </div>
                {{-- Options --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Options</label>
                    <div id="optionsWrapper" class="space-y-3">
                        <input type="text" name="options[]" placeholder="Option 1" autocomplete="off"
                            class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black">
                        <input type="text" name="options[]" placeholder="Option 2" autocomplete="off"
                            class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black">
                    </div>
                    <button type="button" id="addOptionBtn"
                        class="mt-3 px-3 py-1 bg-gray-200 text-sm rounded-lg hover:bg-gray-300 transition">
                        + Add Option
                    </button>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                            class="px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
                    Create Poll
                    </button>
                </div>
            </form>
          </div>
        </div>
    </div>
    {{-- Dynamic option fields --}}
    <script>
        document.getElementById('addOptionBtn').addEventListener('click', function() {
            const wrapper = document.getElementById('optionsWrapper');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'options[]';
            input.placeholder = `Option ${wrapper.children.length + 1}`;
            input.className = "w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black mt-2";
            wrapper.appendChild(input);
        });
    </script>
@endsection