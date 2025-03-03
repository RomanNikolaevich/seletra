<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    /**
     * @param array $data
     * @return Course
     */
    public function createCourse(array $data): Course
    {
        return Course::create([
            'name' => $data['name'],
            'link' => $data['link'],
            'description' => $data['description'],
            'type_id' => $data['type_id'],
            'category_id' => $data['category_id'],
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * I was having problems with adding to favorites, which was removing the subcategory data from the pivot table.
     * So I had to use this crutch:
     * When editing a course, before updating, first get and save the current subcategory relationships.
     * Then, after updating the master data, we retrieve the selected subcategories from the query again and merge
     * them with the current subcategories.
     * Now the sync() method will only synchronize new subcategories and add them to the existing ones, without
     * deleting the ones that were already linked to the course.
     * @param Course $course
     * @param array $data
     * @return void
     */
    public function updateCourse(Course $course, array $data): void
    {
        $course->update($data);

        $currentSubcategories = $course->courseSubcategories->pluck('id')->toArray();
        $selectedSubcategories = $data['checkedSubcategory'] ?? [];
        $updatedSubcategories = array_merge($currentSubcategories, $selectedSubcategories);
        $course->courseSubcategories()->sync($updatedSubcategories);
    }

    public function destroyCourse(Course $course): void
    {
        $course->courseSubcategories()->detach();

        $course->delete();
    }
}
