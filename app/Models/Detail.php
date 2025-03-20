<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table="details";
    protected $fillable = ['user_id', 'name', 'email', 'dob', 'typeofvehicle'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
