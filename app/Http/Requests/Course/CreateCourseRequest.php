<?php

namespace App\Http\Requests\Course;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CreateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:150'],
            'description' => ['required'],
            'price' => ['required', 'integer'],
            'level' => ['required', Rule::in(["entry", "intermediate", "expert"])],
            'program_id' => ['required', 'exists:programs,id'],
            'thumbnail' => ['nullable', 'string'],

        ];
    }

    function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponse::badRequest($validator->getMessageBag()->getMessages()));
    }
}
