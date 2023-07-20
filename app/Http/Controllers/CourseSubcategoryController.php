<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\CourseSubcategory;
use Illuminate\Http\Request;
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
            'newSubcategory' => 'required|string|max:255',
        ]);

        $subcategory = CourseSubcategory::create([
            'name' => $request->input('newSubcategory'),
            'category_id' => $request->input('categoryId'),
            'user_id' => auth()->id(),

        ]);
//         Добавление связи между подкатегорией и курсами (пример)
//        $subcategory->courses()->attach($courseIds);
    }

    public function update(Request $request, CourseSubcategory $subcategory)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subcategory->update($request->all());

        // Обновление связей с курсами (пример)
        //$subcategory->courses()->sync($courseIds);
    }

    public function destroy(CourseSubcategory $subcategory)
    {
        $subcategory->delete();
    }
}
