<script setup>
defineProps({
    courseStatus: Object,
});

</script>

<template>
    <span v-if="courseStatus.id === 1" class="badge bg-lime-400">{{ courseStatus.name_en }}</span>
    <span v-else-if="courseStatus.id === 2" class="badge bg-emerald-500 ">{{ courseStatus.name_en }}</span>
    <span v-else-if="courseStatus.id === 3" class="badge bg-sky-500">{{ courseStatus.name_en }}</span>
    <span v-else-if="courseStatus.id === 4" class="badge bg-indigo-600 text-white">{{ courseStatus.name_en }}</span>
    <span v-else-if="courseStatus.id === 5" class="badge bg-violet-700 text-white">{{ courseStatus.name_en }}</span>
    <span v-else class="badge bg-gray-500 text-white">{{ courseStatus.name_en }}</span>
</template>
