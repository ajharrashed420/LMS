<?php

namespace App\Models;

use App\Models\User;
use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    public function curriculums() {
        return $this->hasMany(Curriculum::class);
    }

    public function students() {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'user_id');
    }
}
