<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        $quiz = Quiz::paginate(12);
         return view('quiz.index', [
            'quiz' => $quiz
         ]);
    }

    public function store(Request $request) {
        $quiz = Quiz::create([
            'name' => $request->name,
        ]);
        return redirect()->route('quiz.show', $quiz->id);
    }

    public function show(Quiz $quiz) {
        return view('quiz.show', [
            'id' => $quiz
        ]);
    }
}
