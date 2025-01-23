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
            "instructor" => [
                "id" => $this->instructor->id,
                "name" => $this->instructor->name,
            ],
            "program" => [
                "id" => $this->program->id,
                "title" => $this->program->title,
            ],
            "thumbnail" => $this->thumbnail,
        ];
    }
}
