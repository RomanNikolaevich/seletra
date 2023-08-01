<script setup>
import {Link} from "@inertiajs/vue3";
import IndexCourseItemSummary from "@/Pages/Courses/Partials/IndexCourseItemSummary.vue";
import CourseType from "@/Components/Fas/CourseType.vue";
import IndexCourseItemBody from "@/Pages/Courses/Partials/IndexCourseItemBody.vue";
import ShortDescription from "@/Components/Dashboard/ShortDescription.vue";
import {formatDateTime} from "@/Components/JS/formatDateTime.js"

const props = defineProps({
    course: Object,
});

const blackText = (props.course.status_id === 1 || props.course.status_id === 2 || props.course.status_id === 3);
</script>

<template>
    <details class="collapse close mb-2">
        <IndexCourseItemSummary :course="course">
            <CourseType :courseType="course.type_id" class="ml-2 mr-4"/>
            {{ props.course.id }}: {{ props.course.name }}
        </IndexCourseItemSummary>
        <IndexCourseItemBody :course="course">
            <p>
                <ShortDescription
                    :course="course"
                    :textLength="150"
                    :blackText="blackText"
                />
            </p>
            <p>
                <span class="font-extrabold">Created: </span>{{ formatDateTime(props.course.created_at) }}
            </p>
            <p>
                <Link v-if="blackText"
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
