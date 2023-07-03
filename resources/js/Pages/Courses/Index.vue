<script setup>
import {Head} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/Auth/AuthenticatedLayout.vue";
import CoursesList from "@/Components/Dashboard/CoursesList.vue";

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
        <CoursesList :courses="courses" />
    </AuthenticatedLayout>

</template>

<style scoped>

</style>
