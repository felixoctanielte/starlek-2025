<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isthara extends Model
{
    use HasFactory;

    protected $table = 'isthara';
    // Izinkan kolom-kolom ini untuk mass assignment
    protected $fillable = [
        'name',
        'description',
        'image',
        'vote_count',
    ];
}
