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
            "title" => $this->title,
            "description" => $this->description,
            "price" => $this->price,
            "level" => $this->level,
            "instructor" => [
                "id" => $this->whenLoaded('instructor')->id ?? "",
                "name" => $this->whenLoaded('instructor')->name ?? "",
            ],
            "program" => [
                "id" => $this->whenLoaded('program')->id,
                "title" => $this->whenLoaded('program')->title,
            ],
            "material" => $this->materials->count(),
            "thumbnail" => $this->thumbnail,
        ];
    }
}
