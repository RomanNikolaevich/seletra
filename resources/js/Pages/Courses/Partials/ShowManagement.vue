<script setup>

import CourseShowHeader from "@/Components/Dashboard/CourseShowHeader.vue";
import {useBlockVisibilityMixin} from "@/Components/JS/useBlockVisibilityMixin.js";
import DangerButton from "@/Components/Auth/DangerButton.vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    course: Object,
});

const { isBlockVisible, toggleBlock, toggleButtonIcon } = useBlockVisibilityMixin();

const deleteCourse= () => {
    if (confirm(`Are you sure you want to delete the course "${props.course.name}"?`)) {
        router.delete(route('courses.destroy', props.course.id), {
            onSuccess: () => {
            },
            onError: (error) => {
                console.error(error);
            },
        });
    }
};
</script>

<template>
    <section class="mb-4">
        <CourseShowHeader
            :toggleBlock ="toggleBlock"
            :toggleButtonIcon="toggleButtonIcon"
        >
            <template #headerName>
                Course management
            </template>
        </CourseShowHeader>

        <div v-show="isBlockVisible">
            <DangerButton @click="deleteCourse">
                Delete
            </DangerButton>
        </div>
    </section>
</template>
