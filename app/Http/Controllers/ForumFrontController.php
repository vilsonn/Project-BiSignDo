<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class ForumFrontController extends Controller
{
    /**
     * Menampilkan semua pertanyaan dan pertanyaan milik user saat ini.
     */
    public function index(Request $request)
    {
        $query = Question::with('user');
    
        // Search filter
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }
    
        // Sorting
        if ($request->has('sort') && $request->sort == 'oldest') {
            $query->oldest();
        } else {
            $query->latest();
        }
    
        $questions = $query->paginate(9); // 9 questions per page
    
        return view('forum.index', compact('questions'));
    }
    

    public function myQuestions()
    {
        $myQuestions = Question::where('user_id', Auth::id())->latest()->get();

        return view('forum.my-questions', compact('myQuestions'));
    }


    /**
     * Menampilkan detail sebuah pertanyaan dan jawaban terkait.
     */
    public function show($id)
    {
        $question = Question::with(['user', 'answers.user'])->findOrFail($id);

        return view('forum.show', compact('question'));
    }

    /**
     * Form untuk membuat pertanyaan baru.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Proses menyimpan pertanyaan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Question::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('forum.index')->with('success', 'Question created successfully.');
    }

    /**
     * Form untuk mengedit pertanyaan milik user.
     */
    public function edit($id)
    {
        $question = Question::where('user_id', Auth::id())->findOrFail($id);
    
        return view('forum.edit', compact('question'));
    }
    

    /**
     * Proses memperbarui pertanyaan milik user.
     */
    public function update(Request $request, $id)
    {
        $question = Question::where('user_id', Auth::id())->findOrFail($id);
    
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $question->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
    
        return redirect()->route('forum.myQuestions')->with('success', 'Question updated successfully.');
    }
    

    /**
     * Menghapus pertanyaan milik user beserta jawaban terkait.
     */
    public function destroy($id)
    {
        $question = Question::where('user_id', Auth::id())->findOrFail($id);

        $question->delete();

        return redirect()->route('forum.index')->with('success', 'Question deleted successfully.');
    }

    /**
     * Proses menyimpan jawaban baru untuk pertanyaan tertentu.
     */
    public function storeAnswer(Request $request, $questionId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Answer::create([
            'question_id' => $questionId,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('forum.show', $questionId)->with('success', 'Answer added successfully.');
    }

    /**
     * Form untuk mengedit jawaban milik user.
     */
    public function editAnswer($id)
    {
        $answer = Answer::where('user_id', Auth::id())->findOrFail($id);

        return view('forum.edit-answer', compact('answer'));
    }

    /**
     * Proses memperbarui jawaban milik user.
     */
    public function updateAnswer(Request $request, $id)
    {
        $answer = Answer::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'content' => 'required|string',
        ]);

        $answer->update([
            'content' => $request->content,
        ]);

        return redirect()->route('forum.show', $answer->question_id)->with('success', 'Answer updated successfully.');
    }

    /**
     * Menghapus jawaban milik user.
     */
    public function destroyAnswer($id)
    {
        $answer = Answer::where('user_id', Auth::id())->findOrFail($id);

        $answer->delete();

        return redirect()->route('forum.show', $answer->question_id)->with('success', 'Answer deleted successfully.');
    }
}
