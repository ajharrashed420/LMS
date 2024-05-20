<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'answer_a',
            'answer_b',
            'answer_c',
            'answer_d',
            'correct_answer',
    ];

    public function questions() {
        return $this->belongsToMany(Question::class, 'quiz_question', 'quiz_id', 'question_id');
    }
}
