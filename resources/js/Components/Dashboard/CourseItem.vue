<script setup>
import CourseType from "@/Components/Dashboard/CourseType.vue";

defineProps({
    course: Object,
});

const formatDateTime = (dateTime) => {
    const options = {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
    };
    const formattedDateTime = new Date(dateTime).toLocaleString(undefined, options);
    return formattedDateTime;
};

</script>

<template>
    <details class="collapse bg-base-200">
        <summary class="collapse-title text-xl font-semibold to-blue-700 hover:text-indigo-800"><CourseType :courseType="course.type" /> {{ course.name }}</summary>
        <div class="collapse-content" >
            <p>id: {{ course.id }}, Name:{{ course.name }}</p>
            <p>description: {{ course.description }} </p>
            <p>Link: {{ course.link }}</p>
            <p>Status: {{ course.status }}, created: {{ formatDateTime(course.created_at) }}</p>
        </div>
    </details>
    <div>

    </div>
</template>

<style scoped>

</style>
