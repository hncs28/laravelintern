<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Detail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getdetail(){
        $id = auth()->id();
        $detail = new Detail();
        $detail = $detail->getDetail($id);
        return response()->json($detail);
    }
}
