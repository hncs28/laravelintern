<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Course;
use Auth;
use App\Models\CourseUser;
use Illuminate\Support\Facades\Cache;
class CourseController extends Controller
{
    public function getUserCourses(Request $request)
    {
        $user = Auth::guard('api')->user();
        $courses = $user->courses;

        return response()->json([
            'user' => $user->username,
            'courses' => $courses
        ]);
    }
    public function getCoursesJson()
    {
        return response()->json(Course::getAllCourses());
    }
    public function getCoursesByCategory($categoryId)
    {
        $courses = Course::getByCategory($categoryId);
        return response()->json($courses);
    }
    public function getUserandCourses(Request $request)
    {
        $userID = auth()->id();
        try {

            $courses = CourseUser::where('user_id', $userID)
                ->with([
                    'course' => function ($query) {
                        $query->select('id', 'courseName', 'coursePrice');
                    }
                ])
                ->get()
                ->map(function ($courseUser) {
                    return [
                        'courseID' => $courseUser->course->id,
                        'courseName' => $courseUser->course->courseName,
                        'coursePrice' => $courseUser->course->coursePrice,
                        'added_at' => $courseUser->created_at,
                    ];
                });

            if ($courses->isEmpty()) {
                return response()->json(['message' => 'No courses found for this user'], 404);
            }

            return response()->json([
                'message' => 'Courses retrieved successfully',
                'courses' => $courses
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Error retrieving user courses: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to retrieve courses'], 500);
        }
    }
}
