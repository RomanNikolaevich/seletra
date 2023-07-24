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
    private Collection $courseSubcategories;

    public function __construct()
    {
        $this->courseTypes = CourseType::all();
        $this->courseCategories = CourseCategory::all();
        $this->courseSubcategories = CourseSubcategory::all();
    }

    /**
     * Displaying a List of Courses
     * @return Response
     */
    public function index()
    {
        $courses = Course::query()->latest()->get();

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
            'courseSubcategories' => $this->courseSubcategories,
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
            'category_id' => $request->input('courseCategories'),
        ]);

        // Добавление связи с подкатегориями (пример)
//        $subcategories = $request->input('courseSubcategories');
//        $course->subcategories()->attach($subcategories);
        // Замените $subcategories на фактические идентификаторы подкатегорий

        return redirect()->route('courses.index');
    }

    /**
     * Displaying a specific course
     * @param Course $course
     * @return Response
     */
    public function show(Course $course)
    {
        return Inertia::render('Courses/Show', [
            'course' => $course,
            'courseCategory' => $course->courseCategory()->first(),
            'courseCategories' => $this->courseCategories,
//            'courseSubcategory' => $course->courseSubcategories()->first(),
            'courseSubcategories' => CourseSubcategory::query()
                ->where('user_id', auth()
                ->id())
                ->get(),
            'courseType' => $course->courseType()->first(),
            'courseStatus' => $course->courseStatus()->first(),
        ]);
    }

    /**
     * Course editing
     * @param Course $course
     * @return Response
     */
    public function edit(Course $course)
    {
        return Inertia::render('Courses/Edit', [
            'course' => $course,
            'courseTypes' => $this->courseTypes,
            'courseCategories' => $this->courseCategories,
            'courseSubcategories' => $this->courseSubcategories,
        ]);
    }

    /**
     * Course update
     * @param Request $request
     * @param Course $course
     * @return void
     */
    public function update(Request $request, Course $course)
    {
//        $request->validate([
//            'name' => 'required',
//            'link' => 'required',
//            'description' => 'required',
//        ]);

        $course->update($request->all());

//        $subcategories = $request->input('courseSubcategories');
//        $course->courseSubcategories()->sync($subcategories);
        // Замените $subcategories на фактические идентификаторы подкатегорий

//                return redirect()->route('courses.show', ['course' => $course]);
    }

    /**
     * Deleting a course
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Course $course)
    {
        // Удаление связей с подкатегориями
        $course->courseSubcategories()->detach();

        $course->delete();

        return redirect()->route('courses.index');
    }
}
