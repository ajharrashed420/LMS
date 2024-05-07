<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;
use App\Models\Curriculum;

class CurriculumEdit extends Component
{   
    public $curriculum_id;
    public $name;
    public $note;

    public function mount()
    {   
        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        $this->lead_id = $curriculum->id;
        $this->name = $curriculum->name;
    }


    public function render()
    {
        $curriculum = Curriculum::where('id', $this->curriculum_id)->with('notes')->first();
        return view('livewire.curriculum-edit', [
            'class' => $curriculum
        ]);
    }

    protected $rules = [
        'name' => 'required',
        'note' => 'required',
    ];

    public function formSubmit() {

        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        $curriculum->name = $this->name;
        $curriculum->save();

        flash()->addSuccess('Your class name updated.');
    }

    public function addNote() {
        $this->validate();

        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        $note = new Note();
        $note->description = $this->note;
        $note->save();
        $curriculum->notes()->attach($note->id);
        
        $this->note = '';

        flash()->addSuccess('Your not has been added');
    }
}
