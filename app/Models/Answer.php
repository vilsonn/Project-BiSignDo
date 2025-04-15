<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara mass-assignment.
     */
    protected $fillable = [
        'question_id',
        'user_id',
        'content',
    ];

    /**
     * Relasi ke model Question (Pertanyaan terkait).
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Relasi ke model User (Pembuat jawaban).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
