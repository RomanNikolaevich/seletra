<script setup>

import {ref} from "vue";

const isHovered = ref(false);
</script>

<template>
    <font-awesome-icon
        :icon="['fas', 'pen']"
        :class="{'fa-bounce': isHovered}"
        @mouseover="isHovered = true"
        @mouseleave="isHovered = false"
        size="lg" style="color: #0f0f10;"
    />
</template>
