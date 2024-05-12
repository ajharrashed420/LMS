<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\Question;

class QuizEdit extends Component
{
    public $quiz;
    public $question_id;
    public function render()
    {
        return view('livewire.quiz-edit', [
            'questions' => Question::select('id', 'name')->get(),
            'quiz_questions' => Quiz::with('questions')->first()
        ]);
    }


    public function addQuestion() {
        $this->quiz->questions()->attach($this->question_id);
        flash()->addSuccess('Question added successfully!');
    }

    public function questionDelete() {
         
    }
}
