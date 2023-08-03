<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\CourseSubcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class CourseSubcategoryController extends Controller
{
    public function index()
    {
        $categories = CourseCategory::query()
            ->orderBy('id')
            ->get();
        $subcategories = CourseSubcategory::query()
            ->where('user_id', auth()->id())
            ->orderBy('id')
            ->get();

        return Inertia::render('Subcategories/Index', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'newSubcategory' => [
                'required',
                'string',
                'max:255',
                Rule::unique('course_subcategories', 'name')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
        ]);

        CourseSubcategory::query()
            ->create([
                'name' => $request->input('newSubcategory'),
                'category_id' => $request->input('categoryId'),
                'user_id' => auth()->id(),
            ]);
//         Добавление связи между подкатегорией и курсами (пример)
//        $subcategory->courses()->attach($courseIds);

        session()->flash('success', 'Subcategory Create Successfully');
        return Inertia::location(route('subcategories.index'));
    }

    public function update(Request $request, CourseSubcategory $subcategory)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subcategory->update($request->all());
        session()->flash('success', 'Subcategory Update Successfully');
        return Inertia::location(route('subcategories.index'));
    }

    public function destroy(CourseSubcategory $subcategory)
    {
        $subcategory->delete();
        session()->flash('warning', "Subcategory $subcategory->name Deleted Successfully");
        return Inertia::location(route('subcategories.index'));
    }
}
