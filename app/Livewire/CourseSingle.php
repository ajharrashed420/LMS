<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Curriculum;

class CourseSingle extends Component
{   
    public $course_id;

    public function render()
    {
        $course = Course::where('id', $this->course_id)->with('curriculums')->first();
        return view('livewire.course-single',[
            'course' => $course
        ]);
    }


    public function classDelete($id) {
        $curriculum = Curriculum::findOrFail($id);
        flash()->addSuccess('You have deleted!');
        $curriculum->delete();

    }
}
