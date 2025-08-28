@extends('master')

@section('title')
    Simple Polling App
@endsection

@section('main-content')
   <div class="max-w-2xl mx-auto px-4 py-6">
        @if ($polls->isEmpty())
            <p class="text-gray-500 text-center">No polls available at the moment.</p>
        @else
            <div class="grid grid-cols-1 gap-6">
                @foreach ($polls as $poll)
                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold mb-2">{{ $poll->question }}</h2>
                            <p class="text-sm text-gray-500 mb-4">
                                {{ $poll->options->count() }} options available
                            </p>
                        </div>
                        <div class="mt-4">
                            <a href="" 
                               class="px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow">
                                View & Vote
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection