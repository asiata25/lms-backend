<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseDetailResource;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $course = Course::where('instructor_id', $user_id)->with('program')->get();

        return ApiResponse::ok(['courses' => new CourseCollection($course)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCourseRequest $request)
    {
        $user = $request->user();

        if ($user->tokenCant('course:update')) {
            return ApiResponse::forbidden();
        }

        $data = $request->validated();

        $course = $user->courses()->create($data);

        $course->load(['program']);

        $resourceArray = (new CourseResource($course))->toArray(request());

        $resourceArray['instructor'] = [
            'id' => $user->id,
            'name' => $user->name,
        ];

        return ApiResponse::created(['course' => $resourceArray]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course = Course::where('instructor_id', Auth::id())->where('id', $course->id)->with('program', 'materials')->first();
        
        return ApiResponse::created(['course' => new CourseDetailResource($course)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
