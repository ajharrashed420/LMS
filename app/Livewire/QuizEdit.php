<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuizEdit extends Component
{
    public $quiz;
    public $question_id;
    public function render()
    {
        //dd($this->quiz->questions->pluck('id')->toArray());
        $questions = Question::select(['id', 'name'])->whereNotIn('id', $this->quiz->questions->pluck('id')->toArray())->get();
        return view('livewire.quiz-edit', [
            'questions' => $questions,
        ]);
    }


    public function addQuestion() {
        $this->quiz->questions()->attach($this->question_id);
        flash()->addSuccess('Question added successfully!');

        return redirect()->route('quiz.show', $this->quiz->id);
    }

    public function questionDelete($id) {
         $questions = DB::table('quiz_question')->where('question_id', $id)->delete();
          flash()->addSuccess('Question deleted from this quiz!');
    }
}
