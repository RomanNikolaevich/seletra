<script setup>

import EndEditCheck from "@/Components/Fas/EndEditCheck.vue";
import StartEditPen from "@/Components/Fas/StartEditPen.vue";
import CancelEditBan from "@/Components/Fas/CancelEditBan.vue";

const {isEditing, form, submit, startEdit, cancelEdit} = defineProps([
    "isEditing",
    "form",
    "submit",
    "startEdit",
    "cancelEdit"
]);
</script>

<template>
    <div class="flex-none">
        <div v-if="isEditing">
            <button
                type="submit"
                :disabled="form.processing"
                @click="submit"
            >
                <EndEditCheck/>
            </button>
            <button
                type="submit"
                :disabled="form.processing"
                @click="cancelEdit"
                class="ml-2"
            >
                <CancelEditBan/>
            </button>
        </div>
        <button v-else
                type="submit"
                :disabled="form.processing"
                @click="startEdit"
        >
            <StartEditPen/>
        </button>
    </div>
</template>
