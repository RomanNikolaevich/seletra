<script setup>
import {Head} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/Auth/AuthenticatedLayout.vue";
import IndexCoursesList from "@/Pages/Courses/Partials/IndexCoursesList.vue";
import FlashMessageSuccess from "@/Components/Dashboard/FlashMessageSuccess.vue";
import FlashMessageWarning from "@/Components/Dashboard/FlashMessageWarning.vue";

const props = defineProps({
    courses: Object,
    flash: Object,
});

</script>

<template>
    <Head>
        <title>Seletra: Self-learning</title>
        <meta name="description" content="Your page description">
    </Head>
    <AuthenticatedLayout>
        <FlashMessageSuccess v-if="flash.success" :flash="flash" />
        <FlashMessageWarning v-if="flash.warning" :flash="flash" />

        <IndexCoursesList :courses="courses"/>
    </AuthenticatedLayout>
</template>
