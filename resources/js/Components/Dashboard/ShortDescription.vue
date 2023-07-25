<script setup>

import {computed, ref} from "vue";

const props = defineProps({
    course: Object,
    textLength: Number,
    blackText: Boolean,
});

const showFullText = ref(false);

const isShortText = computed(() => props.course.description.length <= props.textLength);

const truncatedDescription = computed(() => {
    if (showFullText.value) {
        return props.course.description;
    } else if (isShortText.value) {
        return props.course.description;
    } else {
        return props.course.description.slice(0, props.textLength) + " ...";
    }
});
</script>

<template>
    <span class="font-medium text-lg">{{ truncatedDescription }}</span>

    <template v-if="!isShortText">
        <template v-if="!showFullText">
            <button
                @click="showFullText = true"
                :class="{ 'text-blue-700': blackText, 'text-white': !blackText }"
                class="ml-3 font-extrabold text-2xl"
            >
                <span>+</span>
            </button>
        </template>
        <template v-else>
            <button
                @click="showFullText = false"
                :class="{ 'text-blue-700': blackText, 'text-white': !blackText }"
                class="ml-3 font-extrabold text-2xl"
            >
                <span>&ndash;</span>
            </button>
        </template>
    </template>
</template>
