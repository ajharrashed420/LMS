<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuizShow extends Component
{
    public $quiz;
    public $answer;
    public $answered = [];
    public $selected_ans;
    public $selected_ans_database_get;

    public $question_options = [
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d'
    ];

    public function render()
    {
       
        return view('livewire.quiz-show');
    }

    public function check() {
        $question_id = explode(',', $this->answer)[1];
        $question = Question::findOrFail($question_id);
        $selected_answer = explode('_', $this->answer)[1];
        $selected_answer = explode(',', $selected_answer)[0];
        
        if ($question->correct_answer == $selected_answer) {
            flash()->addSuccess('Your question is correct!');
            $correct = true;
        }else{
            flash()->addError('Your question is incorrect!');
            $correct = false;
        }

        $this->answered[$question_id] = $correct;
    }
}
