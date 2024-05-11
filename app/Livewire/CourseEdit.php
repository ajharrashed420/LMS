<?php
namespace App\Livewire;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;

use App\Models\Curriculum;
use App\Models\Course;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CourseEdit extends Component
{   
    public $course_id;
    public $name;
    public $description;
    public $price;
    public $selectedDays = [];
    public $time;
    public $end_date;


    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];


    public function mount()
    {   
        $course = Course::where('id', $this->course_id)->first();
        $this->course_id = $course->id;
        $this->name = $course->name;
        $this->description = $course->description;
        $this->price = $course->price;
    }


    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required',
        'selectedDays' => 'required',
        'time' => 'required'
    ];

    
    public function render()
    {
        return view('livewire.course-edit');
         
    }


    public function formSubmit()
        {
            $course = Course::where('id', $this->course_id)->with('curriculums')->first();

            foreach ($course->curriculums as $curriculumn) {
                $course->curriculums()->delete($course->id);
            }


            // Check how many sunday available
            $i = 1;
            $start_date = new DateTime(Carbon::now());
            $endDate =   new DateTime($this->end_date);
            $interval =  new DateInterval('P1D');
            $date_range = new DatePeriod($start_date, $interval, $endDate);


            foreach ($date_range as $date) {
                foreach ($this->selectedDays as $day) {
                    if ($date->format("l") === $day) {

                        //To Create Course 
                        $this->validate();
                        $course->update([
                            'name' => $this->name,
                            'description' => $this->description,
                            'price' => $this->price,
                            'user_id' => Auth::user()->id
                        ]);

                        //Create Curriculums with check how many sunday.
                        $curriculum = Curriculum::create([
                            'name' => $this->name . ' #' . $i++,
                            'week_day' => $day,
                            'class_time' => $this->time,
                            'end_date' => $this->end_date,
                            'course_id' => $course->id,
                        ]);
                        
                        flash()->addSuccess('Course updated successfully');
                        return redirect()->route('course.index');
                        
                    }else {
                        flash()->addError('Course not created!');
                        return false;
                    }
                }
            }
            $i++;

        }
}
