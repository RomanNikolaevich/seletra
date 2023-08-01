<script setup>

import AuthenticatedLayout from "@/Layouts/Auth/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import ShowAbout from "@/Pages/Courses/Partials/ShowAbout.vue";
import ShowHistory from "@/Pages/Courses/Partials/ShowHistory.vue";
import ShowTracker from "@/Pages/Courses/Partials/ShowTracker.vue";
import ShowStatistics from "@/Pages/Courses/Partials/ShowStatistics.vue";
import CourseShowHeader from "@/Components/Dashboard/CourseShowHeader.vue";

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
</script>

<template>
    <Head>
        <title>Seletra: Self-learning</title>
        <meta name="description" content="Show course page">
    </Head>

    <AuthenticatedLayout>
<!--        <LogoAnimation/>-->

        <CourseShowHeader>
            <template #headerName>
                {{ course.name }}
            </template>
        </CourseShowHeader>

        <ShowAbout
            :course="course"
            :courseCategory="courseCategory"
            :courseCategories="courseCategories"
            :courseSubcategoriesChecked="courseSubcategoriesChecked"
            :courseSubcategoriesAll="courseSubcategoriesAll"
            :courseType="courseType"
            :courseTypes="courseTypes"
            :courseStatus="courseStatus"
        />

        <ShowTracker
        />

        <ShowStatistics
        />
        <ShowHistory
        />
    </AuthenticatedLayout>
</template>
