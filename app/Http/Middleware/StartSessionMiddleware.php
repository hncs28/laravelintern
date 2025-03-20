<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Middleware\StartSession;

class StartSessionMiddleware extends StartSession
{
    // public function handle($request, Closure $next)
    // {   dd(11);
    //     // $response = parent::handle($request, $next);
    //     // session()->save(); 
    //     // return $response;
    // }
}