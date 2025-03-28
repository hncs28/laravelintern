<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $table = 'lectures';
    protected $fillable = [
        'lectureName',
        'lecturePhone',
    ];
    public static function getLectures()
    {
        return Lecture::all();
    }
}
