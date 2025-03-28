<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';

    protected $fillable = ['courseName', 'coursePrice', 'cat_id', 'lecture_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }
    public static function getAllCourses()
    {
        return self::with('lecture')
            ->get()
            ->map(function ($course) {
                return [
                    'courseID' => $course->id,
                    'courseName' => $course->courseName,
                    'img'=>$course->img,
                    'coursePrice' => $course->coursePrice,
                    'lectureName' => $course->lecture->lectureName ?? 'N/A',
                    'added_at' => $course->created_at,
                ];
            });
    }
    public static function getByCategory($categoryId)
    {
        return self::where('cat_id', $categoryId)->get();
    }
}
