<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles'; // opsional, kalau sama nama tak perlu

    protected $fillable = [
        'title',
        'link',
        'deskripsi',
    ];
}
