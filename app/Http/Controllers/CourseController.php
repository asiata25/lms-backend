<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\Course\CreateCourseRequest;
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
        //
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

        return ApiResponse::ok(['course' => $resourceArray]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
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
