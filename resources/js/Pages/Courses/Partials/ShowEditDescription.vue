<script setup>

import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import ShortDescription from "@/Components/Dashboard/ShortDescription.vue";
import EditButtonGroup from "@/Components/Dashboard/EditButtonGroup.vue";
import InputError from "@/Components/Auth/InputError.vue";

const props = defineProps({
    course: Object,
    showEdit: Boolean,
});

const form = useForm({
    description: props.course.description,
});

const isEditing = ref(false);

const blackText = true;

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
    form.description = props.course.description;
    isEditing.value = false;
}
</script>

<template>
    <div class="flex">
        <div class=" flex-1 bg-white rounded-lg shadow-md h-full">
            <span class="font-bold text-blue-700">Description: </span>
            <template v-if="props.course.description">
                <ShortDescription
                    :course="course"
                    :textLength="170"
                    :blackText="blackText"
                />
            </template>
            <template v-else>
                <span class="font-medium">No description available</span>
            </template>
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
        name="editDescription"
        @submit.prevent="submit"
        class="flex"
        v-if="isEditing">
        <div class=" flex-1 bg-white h-full">
            <div class="font-medium">
                    <textarea
                        id="description"
                        name="description"
                        class="w-full border-gray-300 focus:border-indigo-500
                              focus:ring-indigo-500 rounded-md shadow-sm"
                        v-model.trim="form.description"
                        @keydown.esc="cancelEdit"
                    />
            </div>
            <InputError class="mt-2" :message="form.errors.description"/>
        </div>
    </form>
</template>
