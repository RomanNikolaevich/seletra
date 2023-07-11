<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
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
        $courses = Course::latest()->get();

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
            'name_en' => 'required',
            'link' => 'required',
        ]);

        Course::create([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'type' => $request->input('courseType'),
            'category' => $request->input('courseCategories'),
        ]);

        return redirect()->route('courses.index');
    }

    /**
     * Displaying a specific course
     * @param Course $course
     * @return Response
     */
    public function show(Course $course)
    {
        $category = $course->courseCategory()->first();
        $courseType = $course->courseType()->first();
        $courseStatus = $course->courseStatus()->first();

        return Inertia::render('Courses/Show', [
            'course' => $course,
            'category' => $category,
            'courseType' => $courseType,
            'courseStatus' => $courseStatus,
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
        ]);
    }

    /**
     * Course update
     * @param Request $request
     * @param Course $course
     * @return RedirectResponse
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    /**
     * Deleting a course
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }
}
