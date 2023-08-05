<script setup>
import { ref, computed } from "vue";

const isHovered = ref(false);

const iconColor = computed(() => (isHovered.value ? "#1e58e0" : "#aac7e7"));
</script>

<template>
    <font-awesome-icon
        :icon="['fas', 'pen']"
        :class="{'fa-beat': isHovered}"
        :style="{ color: iconColor }"
        @mouseover="isHovered = true"
        @mouseleave="isHovered = false"
        size="lg"
    />
</template>
