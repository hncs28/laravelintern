<?php

namespace App\Http\Controllers;
use Cache;
use App\Events\LectureAdded;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Jobs\CalculateLecturesCount;

class LectureController extends Controller
{
    public function getCountLecture()
    {
        try {
            $count = Cache::rememberForever('total_lectures', function () {
                return Lecture::count();
            });

            return response()->json(['total_lectures' => $count], 200);
        } catch (\Exception $e) {
            \Log::error('Failed to get lecture count: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to retrieve lecture count'], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'lectureName' => 'required|string|max:255',
            'lecturePhone' => 'required|string|max:15',
        ]);

        $lecture = Lecture::create([
            'lectureName' => $request->lectureName,
            'lecturePhone' => $request->lecturePhone,
        ]);
        CalculateLecturesCount::dispatch();

        return response()->json(['message' => 'Lecture added successfully!']);
    }
}
