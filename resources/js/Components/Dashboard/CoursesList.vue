<script setup>
import CourseItem from "@/Components/Dashboard/CourseItem.vue";

defineProps({
    courses: Object,
});
</script>

<template>
    <header
        class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 w-full text-center py-4"
    >
        <h1 class="text-white font-bold text-4xl">Список доступных курсов</h1>
    </header>
    <div class="container mx-auto ">
        <h2 class="text-2xl font-bold py-10 text-center">Read latest courses</h2>

        <div class="flex ..." v-for="course in courses" :key="course.id">
            <CourseItem :course="course"/>
        </div>

    </div>

</template>
