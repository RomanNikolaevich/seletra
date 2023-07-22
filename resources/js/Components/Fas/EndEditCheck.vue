<script setup>

import {ref} from "vue";

const isHovered = ref(false);
</script>

<template>
    <font-awesome-icon
        :icon="['fas', 'check']"
        :class="{'fa-beat': isHovered}"
        @mouseover="isHovered = true"
        @mouseleave="isHovered = false"
        size="xl" style="color: #0f0f10;"
    />
</template>
