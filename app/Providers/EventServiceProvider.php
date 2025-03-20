<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\LectureAdded::class => [
            \App\Listeners\UpdateLectureCountListener::class,
        ],
    ];

    public function boot()
    {
        //
    }
}