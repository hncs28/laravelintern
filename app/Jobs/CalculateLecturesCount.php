<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use App\Models\Lecture;
use Log;

class CalculateLecturesCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        try {
            $count = Lecture::count();
            Cache::put('total_lectures', $count, 60 * 60);
        } catch (\Exception $e) {
            Log::error('Failed to calculate lectures count', ['exception' => $e]);
            throw $e;
        }
    }

}
