<?php

namespace App\Models;

use App\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    public function notes() {
        return $this->belongsToMany(Note::class, 'lead_note', 'lead_id', 'note_id');
    }
}
