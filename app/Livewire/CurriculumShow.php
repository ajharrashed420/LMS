<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Curriculum;

class CurriculumShow extends Component
{

    public $curriculum_id;


    public function render()
    {   
        $curriculum = Curriculum::where('id', $this->curriculum_id)->with('notes', 'course')->first();
        return view('livewire.curriculum-show', [
            'curriculum' =>  $curriculum
        ]);
    }


}
