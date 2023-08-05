<?php

namespace App\Http\Requests\Course;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubcategoryUpdateRequest extends FormRequest
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
                'min:3',
                'string',
                'max:255',
                Rule::unique('course_subcategories', 'name')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
        ];
    }
}
