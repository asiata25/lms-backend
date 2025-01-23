<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            "id" => $this->id,
            "title" => $this->title,
            "title" => $this->type,
            "url" => $this->url,
            "course" => [
                'id' => $this->whenLoaded('course')->id,
                'title' => $this->whenLoaded('course')->id,
            ],
            "thumbnail" => $this->thumbnail,
        ];;
    }
}
