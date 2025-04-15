<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AdminQuestionController extends Controller
{
    /**
     * Menampilkan daftar semua pertanyaan.
     */
    public function index(Request $request)
    {
        $query = Question::with('user');

        // Search filter
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhereHas('user', function ($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%');
                  });
        }

        $questions = $query->latest()->paginate(10); // 10 questions per page

        return view('admin.forum.index', compact('questions'));
    }

    /**
     * Menampilkan detail pertanyaan dan semua jawabannya.
     */
    public function show($id)
    {
        $question = Question::with(['user', 'answers.user'])->findOrFail($id);

        return view('admin.forum.post', compact('question'));
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        // Menghapus semua jawaban terkait
        $question->answers()->delete();

        // Menghapus pertanyaan
        $question->delete();

        return redirect()->route('admin.forum.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }

    /**
     * Menghapus jawaban dari pertanyaan.
     */
    public function destroyAnswer($id)
    {
        $answer = Answer::findOrFail($id);

        $answer->delete();

        return redirect()->back()->with('success', 'Jawaban berhasil dihapus.');
    }
}
