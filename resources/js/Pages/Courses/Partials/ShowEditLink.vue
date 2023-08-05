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
    link: props.course.link,
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
    form.link = props.course.link;
    isEditing.value = false;
}
</script>

<template>
    <div class="flex">
        <div class=" flex-1 bg-white rounded-lg shadow-md h-full font-medium">
            <span class="font-bold text-blue-700">Course link: </span>
            <template v-if="props.course.link">
                <a
                    :href="props.course.link"
                    target="_blank"
                    class="font-medium text-lg text-grey-400
                    hover:text-blue-700
                    text-decoration: underline"
                >
                    Open link
                </a>
            </template>
            <template v-else>
                <span class="font-medium text-lg">No link available</span>
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
        name="editlink"
        @submit.prevent="submit"
        class="flex"
        v-if="isEditing">
        <div class=" flex-1 bg-white h-full">
            <div class="font-medium">
                <TextInput
                    id="link"
                    type="text"
                    name="link"
                    class="w-full border-gray-300 focus:border-indigo-500
                              focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model.trim="form.link"
                    placeholder="https://example.com"
                    @keydown.esc="cancelEdit"
                />
            </div>
            <InputError class="mt-2" :message="form.errors.link"/>
        </div>
    </form>
</template>
