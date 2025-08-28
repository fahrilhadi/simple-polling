<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polls = Poll::with('options')->latest()->get();
        return view('poll.index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poll.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'question' => 'required|string|max:255',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:100'
        ],[
            'question.required' => 'Question is required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // simpan poll
        $poll = Poll::create([
            'question' => $request->question,
        ]);

        // simpan opsi poll
        foreach ($request->options as $optionText) {
            PollOption::create([
                'poll_id' => $poll->id,
                'option_text' => $optionText,
                'votes_count' => 0
            ]);
        }

        return redirect()->route('poll.index')->with('success', 'Poll created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $poll = Poll::with('options')->findOrFail($id);
        return view('poll.show', compact('poll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function vote(Request $request, $id)
    {
        $request->validate([
            'option_id' => 'required|exists:poll_options,id'
        ]);

        // Tambahkan vote
        $option = PollOption::findOrFail($request->option_id);
        $option->increment('votes_count');

        // Ambil hasil terbaru untuk AJAX response
        $poll = Poll::with('options')->findOrFail($id);
        return response()->json([
            'success' => true,
            'results' => $poll->options->map(function ($opt) {
                return [
                    'id' => $opt->id,
                    'text' => $opt->option_text,
                    'votes' => $opt->votes_count
                ];
            })
        ]);
    }
}
