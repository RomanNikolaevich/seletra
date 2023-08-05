<?php

namespace App\Http\Requests\Course;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:1000',
                Rule::unique('courses')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
            'link' => ['url'],
            'description' => [
                'string',
                'min:3',
                'max:1500',
            ],
            'category_id' => ['integer'],
            'type_id' => ['integer'],
            'checkedSubcategory' => ['array'],
            'favorites' => ['boolean'],

        ];
    }
}
