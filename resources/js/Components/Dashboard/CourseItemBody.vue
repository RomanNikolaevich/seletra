<script setup>

defineProps({
    course: Object,
});
</script>

<template>
    <div v-if="course.status === 1"
             class="collapse-content text-base bg-lime-200 ">
        <slot/>
    </div>
    <div v-else-if="course.status === 2"
             class="collapse-content text-base bg-emerald-400 ">
        <slot/>
    </div>
    <div v-else-if="course.status === 3"
             class="collapse-content text-base bg-sky-400 ">
        <slot/>
    </div>
    <div v-else-if="course.status === 4"
             class="collapse-content text-base bg-indigo-500 text-white">
        <slot/>
    </div>
    <div v-else-if="course.status === 5"
             class="collapse-content text-base bg-violet-600 text-white">
        <slot/>
    </div>
    <div v-else
             class="collapse-content text-base bg-gray-400 text-white ">
        <slot/>
    </div>


</template>
