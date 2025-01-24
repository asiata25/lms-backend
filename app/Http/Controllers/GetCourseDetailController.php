<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseDetailResource;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class GetCourseDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(int $idCourse)
    {
        return ApiResponse::ok(["course" => new CourseDetailResource(Course::where('id', $idCourse)->with('instructor', 'program', 'materials')->first())]);
    }
}
