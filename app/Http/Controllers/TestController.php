<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Adamo;
class TestController extends Controller
{
    public function fetchData()
    {//    dd(Adamo::all());
        dd((new Adamo()));
        $data = Adamo::find('67dd2db017eed060adfc0b31');
        return response()->json($data);
    }
}
