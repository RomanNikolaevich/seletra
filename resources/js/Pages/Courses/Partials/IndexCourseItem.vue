<script setup>
import {Link} from "@inertiajs/vue3";
import IndexCourseItemSummary from "@/Pages/Courses/Partials/IndexCourseItemSummary.vue";
import CourseType from "@/Components/Fas/CourseType.vue";
import IndexCourseItemBody from "@/Pages/Courses/Partials/IndexCourseItemBody.vue";

const props = defineProps({
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
            <CourseType :courseType="course.type_id" class="ml-2 mr-4"/>
            {{ props.course.name }}
        </IndexCourseItemSummary>
        <IndexCourseItemBody :course="course">
            <p>
                <span class="font-extrabold">Description: </span> {{ props.course.description }}
            </p>
            <p>
                <span class="font-extrabold">Created: </span>{{ formatDateTime(props.course.created_at) }}
            </p>
            <p>
                <Link v-if="course.status_id === 1 || course.status_id === 2 || course.status_id === 3"
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

    </details>
</template>
