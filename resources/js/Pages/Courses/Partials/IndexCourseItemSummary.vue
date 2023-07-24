<script setup>

defineProps({
    course: Object,
});
</script>

<template>
    <summary v-if="course.status_id === 1"
             class="collapse-title text-xl font-semibold bg-lime-300 hover:text-indigo-800">
        <slot/>
    </summary>
    <summary v-else-if="course.status_id === 2"
             class="collapse-title text-xl font-semibold bg-emerald-500 hover:text-indigo-800">
        <slot/>
    </summary>
    <summary v-else-if="course.status_id === 3"
             class="collapse-title text-xl font-semibold bg-sky-500 hover:text-indigo-800">
        <slot/>
    </summary>
    <summary v-else-if="course.status_id === 4"
             class="collapse-title text-xl font-semibold bg-indigo-600 text-white hover:text-indigo-200">
        <slot/>
    </summary>
    <summary v-else-if="course.status_id === 5"
             class="collapse-title text-xl font-semibold bg-violet-700 text-white hover:text-indigo-200">
        <slot/>
    </summary>
    <summary v-else
             class="collapse-title text-xl font-semibold bg-gray-500 text-white hover:text-indigo-200">
        <slot/>
    </summary>
</template>
