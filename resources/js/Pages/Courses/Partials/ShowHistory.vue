<script setup>

import CourseShowHeader from "@/Components/Dashboard/CourseShowHeader.vue";
import {useBlockVisibilityMixin} from "@/Components/JS/useBlockVisibilityMixin.js";

const { isBlockVisible, toggleBlock, toggleButtonIcon } = useBlockVisibilityMixin();
</script>

<template>
    <section class="mb-4">
        <CourseShowHeader
            :toggleBlock ="toggleBlock"
            :toggleButtonIcon="toggleButtonIcon"
        >
            <template #headerName>
                History of lessons
            </template>
        </CourseShowHeader>

        <div v-show="isBlockVisible">
            Your history is empty
        </div>
    </section>
</template>
