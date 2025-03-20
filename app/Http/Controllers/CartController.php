<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Session;
use App\Http\Resources\CartCollection;
use App\Models\CourseUser;
class CartController extends Controller
{
    public function addtoCart(Request $request)
    {
        $userID = auth()->id(); 
        $courseID = $request->input('id');
        $course = Course::findOrFail($courseID);
        $cart = Session::get("cart_{$userID}", []);
        if (isset($cart[$courseID])) {
            return response()->json(['message' => 'Course already in cart'], 400);
        }
        $cart[$courseID] = [
            'courseID' => $course->id,
            'courseName' => $course->courseName,
            'coursePrice' => $course->coursePrice,
        ];
        Session::put("cart_{$userID}", $cart);
        \Log::info('Session ID: ' . session()->getId());
        return response()->json(['message' => 'Course added to cart', 'cart' => $cart], 200);
    }
    
    public function getCart()
    {
        $userID = auth()->id();
    $cart = Session::get("cart_{$userID}", []);
    $cartItems = collect($cart)->values();
    return new CartCollection($cartItems);
    }    
    public function clearCart($id)
    {
        $userID = auth()->id();
        if (!$userID) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
    
        $cart = Session::get("cart_{$userID}", []);
        \Log::info('Cart before removal: ', $cart); 
    
        if (!isset($cart[$id])) {
            return response()->json(['message' => 'Course not found in cart'], 404);
        }
    
        unset($cart[$id]);
        Session::put("cart_{$userID}", $cart);
        \Log::info('Cart after removal: ', $cart); 
    
        $cartItems = collect($cart)->values();
        return new CartCollection($cartItems);
    }


public function saveCart(Request $request)
{
    $userID = auth()->id(); 
    $cart = Session::get("cart_{$userID}", []); 
    if (empty($cart)) {
        return response()->json(['message' => 'Cart is empty'], 400);
    }

    try {
        $savedCourses = [];
        $alreadySavedCourses = [];

    
        $userExists = CourseUser::where('user_id', $userID)->exists();

        foreach ($cart as $courseID => $courseData) {
            if ($userExists) {

                $courseExists = CourseUser::where('user_id', $userID)
                                         ->where('course_id', $courseID)
                                         ->exists();

                if ($courseExists) {
     
                    $alreadySavedCourses[] = $courseData['courseName'];
                } else {
         
                    CourseUser::create([
                        'user_id' => $userID,
                        'course_id' => $courseData['courseID'],
                    ]);
                    $savedCourses[] = $courseData['courseName'];
                }
            } else {
                CourseUser::create([
                    'user_id' => $userID,
                    'course_id' => $courseData['courseID'],
                ]);
                $savedCourses[] = $courseData['courseName'];
            }
        }
        $responseMessage = [];
        if (!empty($savedCourses)) {
            $responseMessage[] = 'Courses saved: ' . implode(', ', $savedCourses);
        }
        if (!empty($alreadySavedCourses)) {
            $responseMessage[] = 'Cannot save, already saved: ' . implode(', ', $alreadySavedCourses);
        }


        $status = (!empty($savedCourses) || empty($alreadySavedCourses)) ? 200 : 400;

        return response()->json([
            'message' => implode('. ', $responseMessage) ?: 'No courses to save',
            'saved' => $savedCourses,
            'already_saved' => $alreadySavedCourses
        ], $status);
    } catch (\Exception $e) {
        \Log::error('Error saving cart to database: ' . $e->getMessage());
        return response()->json(['message' => 'Failed to save cart'], 500);
    }
}
}
