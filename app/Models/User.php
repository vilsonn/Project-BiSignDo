<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom-kolom yang boleh diisi secara mass-assignment
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
    ];

    /**
     * Kolom-kolom yang ingin disembunyikan saat serialisasi,
     * misal saat return JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi ke model Question.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Relasi ke model Answer.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function eventRegistrations()
    {
        return $this->hasMany(EventRegistration::class);
    }    

    public function donationsAndFeedbacks()
    {
        return $this->hasMany(DonationAndFeedback::class);
    }
}