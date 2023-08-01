<script setup>

import {formatDateTime} from "@/Components/JS/formatDateTime.js";
import ShowEditName from "@/Pages/Courses/Partials/ShowEditName.vue";
import ShowEditLink from "@/Pages/Courses/Partials/ShowEditLink.vue";
import ShowEditDescription from "@/Pages/Courses/Partials/ShowEditDescription.vue";
import ShowEditCategory from "@/Pages/Courses/Partials/ShowEditCategory.vue";
import ShowEditSubcategory from "@/Pages/Courses/Partials/ShowEditSubcategory.vue";
import ShowEditType from "@/Pages/Courses/Partials/ShowEditType.vue";
import CourseStatusComponent from "@/Components/Dashboard/CourseStatus.vue";
import {ref} from "vue";
import ShowFavorites from "@/Pages/Courses/Partials/ShowFavorites.vue";


defineProps({
    course: Object,
    courseCategory: Object,
    courseCategories: Object,
    courseSubcategoriesChecked: Object,
    courseSubcategoriesAll: Object,
    courseType: Object,
    courseTypes: Object,
    courseStatus: Object,
});

const showEdit = ref(false);

const handleShowEditChange = () => {
    showEdit.value = !showEdit.value;
};
</script>

<template>
    <ShowEditName
        :course="course"
        :showEdit="showEdit"
        :handleShowEditChange="handleShowEditChange"
    />

    <div class="flex flex-wrap text-gray-600 text-lg">

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <ShowEditLink
                :course="course"
                :showEdit="showEdit"
            />
        </div>

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <ShowEditDescription
                :course="course"
                :showEdit="showEdit"
            />
        </div>

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <ShowEditCategory
                :course="course"
                :courseCategory="courseCategory"
                :courseCategories="courseCategories"
                :showEdit="showEdit"
            />
        </div>
        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <ShowEditSubcategory
                :course="course"
                :courseCategory="courseCategory"
                :courseCategories="courseCategories"
                :courseSubcategoriesChecked="courseSubcategoriesChecked"
                :courseSubcategoriesAll="courseSubcategoriesAll"
                :showEdit="showEdit"
            />
        </div>

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <ShowEditType
                :course="course"
                :courseType="courseType"
                :courseTypes="courseTypes"
                :showEdit="showEdit"
            />
        </div>

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <div class="bg-white rounded-lg shadow-md h-full">
                <span class="font-bold text-blue-700">Course status:  </span>
                <span class="font-medium">
                        <CourseStatusComponent :courseStatus="courseStatus"/>
                </span>
            </div>
        </div>

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <div class="bg-white rounded-lg shadow-md h-full">
                <span class="font-bold text-blue-700">Added:   </span>
                <span class="font-medium">{{ formatDateTime(course.created_at) }} </span>
            </div>
        </div>

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <div class="bg-white rounded-lg shadow-md h-full">
                <span class="font-bold text-blue-700">Started:   </span>
                <!--                    <template v-if="">-->
                <!--                        <span class="font-medium"></span>-->
                <!--                    </template>-->
                <!--                    <template v-else>-->
                <!--                        <span class="font-medium">No subcategory available</span>-->
                <!--                    </template>-->
            </div>
        </div>

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <div class="bg-white rounded-lg shadow-md h-full">
                <span class="font-bold text-blue-700">Completed: </span>
                <template v-if="course.completion_at">
                    <span class="font-medium">{{ formatDateTime(course.completion_at) }}</span>
                </template>
                <template v-else>
                    <span class="font-medium">Course not completed yet.</span>
                </template>
            </div>
        </div>

        <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
            <ShowFavorites
                :course="course"
            />
        </div>
    </div>
</template>
