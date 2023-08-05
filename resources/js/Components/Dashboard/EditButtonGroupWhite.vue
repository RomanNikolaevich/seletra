<script setup>

import {ref} from "vue";
import CancelEditBan from "@/Components/Fas/CancelEditBan.vue";

const {isEditing, form, submit, startEdit, cancelEdit} = defineProps([
    "isEditing",
    "form",
    "submit",
    "startEdit",
    "cancelEdit",
]);

const isHovered = ref(false);
</script>

<template>
    <div v-if="isEditing">
        <button
            type="submit"
            :disabled="form.processing"
            @click="submit"
        >
            <font-awesome-icon
                :icon="['fas', 'check']"
                :class="{'fa-beat': isHovered}"
                @mouseover="isHovered = true"
                @mouseleave="isHovered = false"
                size="xl" style="color: #d9d9e3;"
            />
        </button>

        <button
            type="submit"
            :disabled="form.processing"
            @click="cancelEdit"
            class="ml-2"
        >
            <font-awesome-icon
                :icon="['fas', 'ban']"
                :class="{'fa-beat': isHovered}"
                @mouseover="isHovered = true"
                @mouseleave="isHovered = false"
                size="lg" style="color: #d9d9e3;"
            />
        </button>
    </div>

    <button v-else
            type="submit"
            :disabled="form.processing"
            @click="startEdit"
    >
        <font-awesome-icon
            :icon="['fas', 'pen']"
            :class="{'fa-beat': isHovered}"
            @mouseover="isHovered = true"
            @mouseleave="isHovered = false"
            size="xl" style="color: #d9d9e3;"
        />
    </button>

</template>
