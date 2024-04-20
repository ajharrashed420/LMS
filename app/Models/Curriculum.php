<?php

namespace App\Models;

use App\Models\Homework;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curriculum extends Model
{
    use HasFactory;


    public function homeworks() {
        return $this->hasMany(Homework::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}
