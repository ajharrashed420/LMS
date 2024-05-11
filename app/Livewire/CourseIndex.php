<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {   
        $course = Course::paginate(10);
        return view('livewire.course-index', [
            'courses' => $course,
        ]);
    }


    
    public function courseDelete($id) {
        $course = Course::findOrFail($id);
        flash()->addSuccess('You have deleted!');
        $course->delete();

    }
}
