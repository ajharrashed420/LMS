<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionIndex extends Component
{
    public function render()
    {
        return view('livewire.question-index', [
            'questions' => Question::paginate(10)
        ]);
    }

    public function deleteQuestion($id) {
        Question::where('id', $id)->delete();
    }
}
