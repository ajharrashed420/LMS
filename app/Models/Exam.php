<?php

namespace App\Models;

use App\Models\Homework;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    public function homeworks() {
        return $this->hasMany(Homework::class);
    }
}
