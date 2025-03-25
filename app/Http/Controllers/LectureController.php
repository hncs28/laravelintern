<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Jobs\CalculateLecturesCount;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class LectureController extends Controller
{
    public function getLectureCount()
    {
        try {
            $count = Cache::remember('total_lectures', 60 * 60, function () {
                return Lecture::count();
            });

            return response()->json(['total_lectures' => $count], 200);
        } catch (\Exception $e) {
            Log::error('Failed to get lecture count', ['exception' => $e]);
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

        $lectures = Lecture::getLectures();
        return view('lectures/lectures', compact('lectures'));
    }

    public function getalllectures()
    {
        $lectures = Lecture::getLectures();
        return view('lectures/lectures', compact('lectures'));
    }
    public function edit($id)
    {
        $lecture = Lecture::find($id);
        return view('lectures/edit', compact('lecture'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'lectureName' => 'required|string|max:255',
            'lecturePhone' => 'required|string|max:15',
        ]);

        $lecture = Lecture::find($id);
        $lecture->lectureName = $request->lectureName;
        $lecture->lecturePhone = $request->lecturePhone;
        $lecture->save();

        $lectures = Lecture::getLectures();
        return view('lectures/lectures', compact('lectures'));
    }
    public function destroy($id)
    {
        $lecture = Lecture::find($id);
        $lecture->delete();

        $lectures = Lecture::getLectures();
        return view('lectures/lectures', compact('lectures'));
    }
}
