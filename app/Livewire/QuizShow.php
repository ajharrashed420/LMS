<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuizShow extends Component
{
    public $quiz;
    public $answer;
    public function render()
    {
        
        return view('livewire.quiz-show');
    }

    public function check() {
        $question_id = explode(',', $this->answer)[1];
        $question = Question::findOrFail($question_id);
        $correct_answer = explode(',', $this->answer)[0];
        
        if ($question->correct_answer == $correct_answer) {
            flash()->addSuccess('Your question is correct!');
        }else{
            flash()->addError('Your question is incorrect!');
        } 
    }
}
