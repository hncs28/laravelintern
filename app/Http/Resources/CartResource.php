<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'course_id' => $this->resource['courseID'],
            'course_name' => $this->resource['courseName'],
            'course_price' => $this->resource['coursePrice'],
        ];
    }
}