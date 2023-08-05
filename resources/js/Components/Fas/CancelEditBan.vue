<script setup>

import {ref} from "vue";

const isHovered = ref(false);
</script>

<template>
    <font-awesome-icon
        :icon="['fas', 'ban']"
        :class="{'fa-beat': isHovered}"
        @mouseover="isHovered = true"
        @mouseleave="isHovered = false"
        size="lg" style="color: #063fbe;"
    />
</template>
