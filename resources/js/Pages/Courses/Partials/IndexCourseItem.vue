<script setup>
import {Link} from "@inertiajs/vue3";
import IndexCourseItemSummary from "@/Pages/Courses/Partials/IndexCourseItemSummary.vue";
import CourseType from "@/Components/Dashboard/CourseType.vue";
import IndexCourseItemBody from "@/Pages/Courses/Partials/IndexCourseItemBody.vue";

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
    return new Date(dateTime).toLocaleString(undefined, options);
};

</script>

<template>
    <details class="collapse mb-2">
        <IndexCourseItemSummary :course="course">
            <CourseType :courseType="course.type"/>
            {{ course.name }}
        </IndexCourseItemSummary>
        <IndexCourseItemBody :course="course">
            <p>
                <span class="font-extrabold">Description: </span> {{ course.description }}
            </p>
            <p>
                <span class="font-extrabold">Created: </span>{{ formatDateTime(course.created_at) }}
            </p>
            <p>
                <Link v-if="course.status === 1 || course.status === 2 || course.status === 3"
                      :href="route('courses.show', { id: course.id })"
                      class="font-semibold text-indigo-700  hover:text-indigo-900"
                >Read more ...
                </Link>
                <Link v-else :href="route('courses.show', { id: course.id })"
                      class="font-semibold text-white hover:text-gray-200"
                ><span class="font-extrabold">Read more ... </span>
                </Link>
            </p>

        </IndexCourseItemBody>
        <div class="collapse-content">

        </div>
    </details>
</template>
