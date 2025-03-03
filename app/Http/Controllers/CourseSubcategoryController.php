<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\SubcategoryStoreRequest;
use App\Http\Requests\Course\SubcategoryUpdateRequest;
use App\Models\CourseCategory;
use App\Models\CourseSubcategory;
use App\Services\SubcategoryService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CourseSubcategoryController extends Controller
{
    public function __construct(private readonly SubcategoryService $subcategoryService)
    {
    }

    /**
     * @return Response
     */
    public function index(): Response
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

    /**
     * @param SubcategoryStoreRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(SubcategoryStoreRequest $request): \Symfony\Component\HttpFoundation\Response
    {
        $this->subcategoryService->createSubcategory($request->validated());

        session()->flash('success', 'Subcategory Create Successfully');
        return Inertia::location(route('subcategories.index'));
    }

    /**
     * @param Request $request
     * @param CourseSubcategory $subcategory
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(
        SubcategoryUpdateRequest $request,
        CourseSubcategory        $subcategory
    ): \Symfony\Component\HttpFoundation\Response
    {
        $this->subcategoryService->updateSubcategory($subcategory, $request->validated());

        session()->flash('success', 'Subcategory Update Successfully');
        return Inertia::location(route('subcategories.index'));
    }

    /**
     * @param CourseSubcategory $subcategory
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(CourseSubcategory $subcategory): \Symfony\Component\HttpFoundation\Response
    {
        $this->subcategoryService->destroySubcategory($subcategory);

        session()->flash('warning', "Subcategory $subcategory->name Deleted Successfully");
        return Inertia::location(route('subcategories.index'));
    }
}
