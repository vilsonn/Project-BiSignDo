<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara mass-assignment.
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    /**
     * Relasi ke model User (Pembuat pertanyaan).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Answer (Jawaban dari pertanyaan ini).
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
