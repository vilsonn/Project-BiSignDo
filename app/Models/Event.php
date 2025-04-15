<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'image',
        'status',
        'max_participants',
        'registration_link',
        'embed_code',
        'type',
    ];    

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
