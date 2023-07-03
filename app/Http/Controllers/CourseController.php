<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    /**
     * Displaying a List of Courses
     * @return Response
     */
    public function index()
    {
        $courses = Course::all();

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
        return Inertia::render('Courses/Create');
    }

    /**
     * Saving the course
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        Course::create($request->all());

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
