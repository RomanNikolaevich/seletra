<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CourseStoreRequest;
use App\Http\Requests\Course\CourseUpdateRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSubcategory;
use App\Models\CourseType;
use App\Services\CourseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    private Collection $courseTypes;
    private Collection $courseCategories;

    private CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseTypes = CourseType::all();
        $this->courseCategories = CourseCategory::all();
        $this->courseService = $courseService;
    }

    /**
     * Displaying a List of Courses
     * @return Response
     */
    public function index(): Response
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
    public function create(): Response
    {
        return Inertia::render('Courses/Create', [
            'courseTypes' => $this->courseTypes,
            'courseCategories' => $this->courseCategories,
        ]);
    }

    /**
     * Saving the course and redirect
     * @param CourseStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CourseStoreRequest $request): RedirectResponse
    {
        $this->courseService->createCourse($request->validated());

        return redirect()->route('courses.index')
            ->with('success', "Course Create Successfully");
    }

    /**
     * Displaying a specific course
     * @param Course $course
     * @return Response
     */
    public function show(Course $course): Response
    {
        $courseCategory = $course->courseCategory()->first();

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
     * Course update
     * @param Request $request
     * @param Course $course
     *
     */

    public function update(CourseUpdateRequest $request, Course $course): void
    {

        $this->courseService->updateCourse($course, $request->validated());
    }

    /**
     * Deleting a course
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Course $course): RedirectResponse
    {
        $this->courseService->destroyCourse($course);

        return redirect()
            ->route('courses.index')
            ->with('warning', "Course \"$course->name\" deleted successfully");
    }
}
