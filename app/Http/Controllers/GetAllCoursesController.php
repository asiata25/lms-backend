<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class GetAllCoursesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response()->json(new CourseCollection(Course::all()))->setStatusCode(200);
    }
}
