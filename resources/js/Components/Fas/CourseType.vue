<script setup>
defineProps({
    courseType: Number,
});
</script>

<template>
    <font-awesome-icon v-if="courseType === 1" icon="fa-regular fa-pen-to-square" />
    <font-awesome-icon v-else-if="courseType === 2" icon="fa-solid fa-chalkboard-user" />
    <font-awesome-icon v-else-if="courseType === 3" icon="fa-solid fa-laptop-file" />
    <font-awesome-icon v-else-if="courseType === 4" icon="fa-solid fa-mobile-screen" />
    <font-awesome-icon v-else-if="courseType === 5" icon="fa-solid fa-microphone" />
    <font-awesome-icon v-else-if="courseType === 6" icon="fa-brands fa-youtube" />
    <font-awesome-icon v-else-if="courseType === 7" icon="fa-solid fa-book-open-reader" />
    <font-awesome-icon v-else-if="courseType === 8" icon="fa-solid fa-building-columns" />
    <font-awesome-icon v-else-if="courseType === 9" icon="fa-solid fa-book" />
    <font-awesome-icon v-else-if="courseType === 10" icon="fa-solid fa-people-arrows" />
    <font-awesome-icon v-else-if="courseType === 11" icon="fa-regular fa-comments" />
    <font-awesome-icon v-else-if="courseType === 12" icon="fa-solid fa-people-group" />
    <font-awesome-icon v-else-if="courseType === 13" icon="fa-solid fa-user-gear" />
    <font-awesome-icon v-else-if="courseType === 14" icon="fa-solid fa-heart-pulse" />
    <font-awesome-icon v-else-if="courseType === 15" icon="fa-solid fa-tv" />
    <font-awesome-icon v-else-if="courseType === 16" icon="fa-solid fa-person-burst" />
</template>
