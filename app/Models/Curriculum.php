<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Course;
use App\Models\Homework;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'week_day',
        'class_time',
        'end_date',
        'course_id'
    ];

    protected $table = 'curricula';


    public function homeworks() {
        return $this->hasMany(Homework::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
 
    public function notes() {
        return $this->belongsToMany(Note::class, 'curriculum_note', 'curriculum_id', 'note_id');
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function presentStudent() {
        return Attendance::where('curriculum_id', $this->id)->count();
    }

}
