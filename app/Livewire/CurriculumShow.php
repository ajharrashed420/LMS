<?php

namespace App\Livewire;
use App\Models\Note;
use Livewire\Component;
use App\Models\Attendance;
use App\Models\Curriculum;

class CurriculumShow extends Component
{

    public $curriculum_id;
    public $note;


    public function render()
    {   
        $curriculum = Curriculum::where('id', $this->curriculum_id)->with('course')->first();
        return view('livewire.curriculum-show', [
            'curriculum' =>  $curriculum
        ]);
    }

    public function addNote() {

        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        $note = new Note();
        $note->description = $this->note;
        $note->save();
        $curriculum->notes()->attach($note->id);
        
        $this->note = '';

        flash()->addSuccess('Your not has been added');
    }


    public function attendance($student_id) {
        Attendance::create([
            'curriculum_id' => $this->curriculum_id,
            'user_id' => $student_id,
        ]);

        flash()->addSuccess('This user present!');
    }

    public function absent($id) {
       $attendance = Attendance::where('user_id', $id)->delete();
    }

}
