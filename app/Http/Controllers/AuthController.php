<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Detail;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmation;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'dob' => 'required|date',
            'typeofvehicle' => 'required|string|max:255',
        ]);

        
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        
        $detail = Detail::create([
            'user_id' => $user->id, 
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'typeofvehicle' => $request->typeofvehicle,
        ]);

        
        $token = $user->createToken('Token')->accessToken;

       
        Mail::to($detail->email)->send(new RegistrationConfirmation($user, $detail));

        return response()->json(['message' => 'Registration successful!','user'=>$user,'token'=>$token]);
    }

    public function login(Request $request) {
            $request->validate([
                'username'=>'required',
                'password'=>'required'
            ]);
            $user = User::where('username',$request->username)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            $token = $user->createToken('Token')->accessToken;
            return response()->json([
                'user'=>$user,
                'token'=>$token
            ]);
    }
    public function logout(Request $request) {
            $request->user()->token()->revoke();
            return response()->json(['message'=>'Logout succ']);
    }
}
