<script setup>

import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import EditButtonGroupWhite from "@/Components/Dashboard/EditButtonGroupWhite.vue";
import TextInput from "@/Components/Auth/TextInput.vue";

const props = defineProps({
    course: Object,
    showEdit: Boolean,
    handleShowEditChange: Function,
});

const form = useForm({
    name: props.course.name,
});

const isEditing = ref(false);

function startEdit() {
    form.name = props.course.name;
    isEditing.value = true;
}

const submit = () => {
    form.put(route("courses.update", props.course.id), {
        onSuccess: () => {
            isEditing.value = false;
        },
    });
};

const cancelEdit = () => {
    form.description = props.course.name;
    isEditing.value = false;
}
</script>

<template>
    <header
        class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 w-full text-center py-4"
    >
        <div class="flex items-center justify-center">
            <div class="flex-none w-14">
                <button>
                    <font-awesome-icon :icon="['far', 'square-minus']" size="xl" style="color: #f2f4f8;" />
                </button>
            </div>
            <div v-if="isEditing" class="grow items-center">
                <h1 class="text-white font-bold text-4xl">About the course </h1>
                <form
                    name="editname"
                    @submit.prevent="submit"
                    class="flex"
                    v-if="isEditing">
                    <div class="flex-1 font-medium self-center">
                        <TextInput type="text"
                               id="name"
                               name="name"
                               v-model.trim="form.name"
                               @keydown.esc="cancelEdit"
                               class="w-full text-center px-4 font-bold text-4xl text-blue-700  rounded-lg"
                        />
                    </div>
                </form>
            </div>
            <div v-else class="grow ">
                <h1 class="text-white font-bold text-4xl">About the course </h1>
                <h1 class="text-white font-bold text-4xl">{{ course.id }}: "{{ course.name }}"</h1>
            </div>
            <div class="flex items-center justify-center h-full w-30">
                    <EditButtonGroupWhite
                        :isEditing="isEditing"
                        :form="form"
                        :submit="submit"
                        :startEdit="startEdit"
                        :cancelEdit="cancelEdit"
                        v-if="showEdit"
                        class="ml-3"
                        :class="{ invisible: !showEdit }"
                    />
                    <button @click="handleShowEditChange" class="ml-4 mr-4">
                        <font-awesome-icon :icon="['fas', 'ellipsis-vertical']" size="xl" style="color: #f3f4f7;"/>
                    </button>
            </div>
        </div>
    </header>
</template>
