<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    /** @use HasFactory<\Database\Factories\MaterialFactory> */
    use HasFactory;

    protected $fillable = ["title", "type", "url", "course_id"];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
