<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "description" => $this->description,
            "price" => $this->price,
            "level" => $this->level,
            // TODO: Add relation to instructor and program
            "instructor" => $this->instructor_id,
            "program" => $this->program_id,
            "thumbnail" => $this->thumbnail,
        ];
    }
}
