<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSubcategory;
use App\Models\CourseType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    private Collection $courseTypes;
    private Collection $courseCategories;

    public function __construct()
    {
        $this->courseTypes = CourseType::all();
        $this->courseCategories = CourseCategory::all();
    }

    /**
     * Displaying a List of Courses
     * @return Response
     */
    public function index()
    {
        $courses = Course::query()
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();


        return Inertia::render('Courses/Index', [
            'courses' => $courses,
        ]);
    }

    /**
     * Create a new course
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Courses/Create', [
            'courseTypes' => $this->courseTypes,
            'courseCategories' => $this->courseCategories,
//            'courseSubcategories' => CourseSubcategory::query()
//                ->where('user_id', auth()->id())
//                ->orderBy('id')
//                ->get(),
        ]);
    }

    /**
     * Saving the course and redirect
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $course = Course::create([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'type_id' => $request->input('courseTypes'),
            'user_id' => auth()->id(),
            'category_id' => $request->input('courseCategories'),
        ]);

        // Добавление связи с подкатегориями (пример)
//        $subcategories = $request->input('courseSubcategories');
//        $course->subcategories()->attach($subcategories);
        // Замените $subcategories на фактические идентификаторы подкатегорий

        return redirect()->route('courses.index')
            ->with('success', "Course Create Successfully");
    }

    /**
     * Displaying a specific course
     * @param Course $course
     * @return Response
     */
    public function show(Course $course)
    {
        $courseCategory = $course->courseCategory()->first();
//        dd($course->category_id);
//        dd($this->courseCategories);
//        dd($course->courseSubcategories()
//            ->where('user_id', auth()->id())
////            ->where('category_id', $course->category_id)
//            ->get());

        return Inertia::render('Courses/Show', [
            'course' => $course,
            'courseCategory' => $courseCategory,
            'courseCategories' => $this->courseCategories,
            'courseSubcategoriesChecked' => $course->courseSubcategories()
                ->where('user_id', auth()->id())
                ->where('category_id', $courseCategory->id)
                ->get(),
            'courseSubcategoriesAll' => CourseSubcategory::query()
                ->where('user_id', auth()->id())
                ->where('category_id', $courseCategory->id)
                ->orderBy('id')
                ->get(),
            'courseType' => $course->courseType()->first(),
            'courseTypes' => $this->courseTypes,
            'courseStatus' => $course->courseStatus()->first(),
        ]);
    }

    /**
     * Course editing
     * @param Course $course
     * @return Response
     */
//    public function edit(Course $course)
//    {
//        return Inertia::render('Courses/Edit', [
//            'course' => $course,
//            'courseTypes' => $this->courseTypes,
//            'courseCategories' => $this->courseCategories,
//            'courseSubcategories' => CourseSubcategory::query()
//                ->where('user_id', auth()->id())
//                ->orderBy('id')
//                ->get(),
//        ]);
//    }

    /**
     * Course update
     * I was having problems with adding to favorites, which was removing the subcategory data from the pivot table.
     * So I had to use this crutch:
     * When editing a course, before updating, first get and save the current subcategory relationships.
     * Then, after updating the master data, we retrieve the selected subcategories from the query again and merge
     * them with the current subcategories.
     * Now the sync() method will only synchronize new subcategories and add them to the existing ones, without
     * deleting the ones that were already linked to the course.
     *
     * @param Request $request
     * @param Course $course
     * @return void
     */
    public function update(Request $request, Course $course): void
    {
//        $request->validate([
//            'name' => 'required',
//            'link' => 'required',
//            'description' => 'required',
//        ]);


        $currentSubcategories = $course->courseSubcategories->pluck('id')->toArray();
        $course->update($request->all());

        $selectedSubcategories = $request->input('checkedSubcategory', []);
        $updatedSubcategories = array_merge($currentSubcategories, $selectedSubcategories);
        $course->courseSubcategories()->sync($updatedSubcategories);
    }

    /**
     * Deleting a course
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Course $course)
    {
        $course->courseSubcategories()->detach();

        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('warning', "Course $course->name deleted successfully");
    }
}
