<?php

namespace App\Models;
use MongoDB\Laravel\Eloquent\Model as Model;
class Adamo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'adamo';
    protected $primaryKey = '_id';
    // public static function getTest()
    // {
    //     $data = self::all();
        
    //     if ($data->isEmpty()) {
    //         \Log::info("No data found in test collection");
    //         return response()->json(["message" => "No data found"], 404);
    //     }
    
    //     return response()->json($data);
    // }
}