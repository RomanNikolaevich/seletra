<script setup>
import {Head} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/Auth/AuthenticatedLayout.vue";
import IndexCoursesList from "@/Pages/Courses/Partials/IndexCoursesList.vue";

defineProps({
    courses: Object,
});
</script>

<template>
    <Head>
        <title>Seletra: Self-learning</title>
        <meta name="description" content="Your page description">
    </Head>
    <AuthenticatedLayout>
        <IndexCoursesList :courses="courses" />
    </AuthenticatedLayout>
</template>
