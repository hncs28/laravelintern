<?php

namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
class Test extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'test';
    protected $primaryKey = '_id';
    public static function getTest()
    {   dd(1);
        $data = self::all();
        
        if ($data->isEmpty()) {
            \Log::info("No data found in test collection");
            return response()->json(["message" => "No data found"], 404);
        }
    
        return response()->json($data);
    }
}
