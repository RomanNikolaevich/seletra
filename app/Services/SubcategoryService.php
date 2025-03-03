<?php

namespace App\Services;

use App\Models\CourseSubcategory;

class SubcategoryService
{

    /**
     * @param array $requestData
     * @return CourseSubcategory
     */
    public function createSubcategory(array $requestData): CourseSubcategory
    {
        return CourseSubcategory::query()
            ->create([
                'name' => $requestData['newSubcategory'],
                'category_id' => $requestData['categoryId'],
                'user_id' => auth()->id(),
            ]);
    }

    /**
     * @param CourseSubcategory $subcategory
     * @param array $requestData
     * @return void
     */
    public function updateSubcategory(CourseSubcategory $subcategory, array $requestData): void
    {
        $subcategory->update($requestData);
    }

    /**
     * @param CourseSubcategory $subcategory
     * @return void
     */
    public function destroySubcategory(CourseSubcategory $subcategory): void
    {
        $subcategory->delete();
    }
}
