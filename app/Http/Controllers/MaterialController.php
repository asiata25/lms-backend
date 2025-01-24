<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\Material\CreateMaterialRequest;
use App\Http\Resources\MaterialCollection;
use App\Http\Resources\MaterialResource;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
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
    public function store(int $idCourse, CreateMaterialRequest $request)
    {
        $user = $request->user();

        if ($user->tokenCant('course:update')) {
            return ApiResponse::forbidden();
        }

        // Validate incoming request
        $data = $request->validated();

        // Add the course_id to the validated data
        $course = Course::find($idCourse);
        if (!$course) {
            return ApiResponse::notFound('course not found');
        }
        $data['course_id'] = $idCourse;

        // Create the material record
        $material = Material::create($data);

        return ApiResponse::created(['material' => new MaterialResource($material)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return $material;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
    }
}
