<script setup>

import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import TextInput from "@/Components/Auth/TextInput.vue";
import EditButtonGroup from "@/Components/Dashboard/EditButtonGroup.vue";
import InputError from "@/Components/Auth/InputError.vue";

const props = defineProps({
    course: Object,
    showEdit: Boolean,
});

const form = useForm({
    name: props.course.name,
});

const isEditing = ref(false);

function startEdit() {
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
    form.cancel();
    // form.name = props.course.name;
    isEditing.value = false;
}
</script>

<template>
    <div class="flex">
        <div class=" flex-1 bg-white rounded-lg shadow-md h-full font-medium">
            <span class="font-bold text-blue-700">Course name: </span>
            <span class="font-medium text-lg">{{ props.course.name}} </span>

        </div>
        <EditButtonGroup
            :isEditing="isEditing"
            :form="form"
            :submit="submit"
            :startEdit="startEdit"
            :cancelEdit="cancelEdit"
            v-show="showEdit"
        />
    </div>

    <form
        name="editName"
        @submit.prevent="submit"
        class="flex"
        v-if="isEditing">
        <div class=" flex-1 bg-white h-full">
            <div class="font-medium">
                <TextInput
                    id="description"
                    type="text"
                    name="name"
                    class="w-full border-gray-300 focus:border-indigo-500
                              focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model.trim="form.name"
                    placeholder="write a new course name"
                    @keydown.esc="cancelEdit"
                />
            </div>
            <InputError class="mt-2" :message="form.errors.name" />
        </div>
    </form>
</template>
