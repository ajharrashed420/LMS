<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionEdit extends Component
{
    public $question_id;
    public $answer = ['a', 'b', 'c', 'd'];

    public $name;
    public $answer_a;
    public $answer_b;
    public $answer_c;
    public $answer_d;

    public $correct_answer;

    public function mount()
    {   
        $question = Question::where('id', $this->question_id)->first();
        $this->question_id = $question->id;
        $this->name = $question->name;
        $this->answer_a = $question->answer_a;
        $this->answer_b = $question->answer_b;
        $this->answer_c = $question->answer_c;
        $this->answer_d = $question->answer_d;
        $this->correct_answer = $question->correct_answer;
        
    }



    public function render()
    {
        return view('livewire.question-edit');
    }


    public function submitForm() {
        $question = Question::where('id', $this->question_id)->first();
        $question->update([
            'name' => $this->name,
            'answer_a' => $this->answer_a,
            'answer_b' => $this->answer_b,
            'answer_c' => $this->answer_c,
            'answer_d' => $this->answer_d,
            'correct_answer' => $this->correct_answer,
        ]);
        flash()->addSuccess('Qustion updated successfully!');
        return redirect()->route('question.index');

    }
}
