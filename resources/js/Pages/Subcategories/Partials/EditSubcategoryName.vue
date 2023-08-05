<script setup>

import TextInput from "@/Components/Auth/TextInput.vue";
import InputError from "@/Components/Auth/InputError.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/Auth/PrimaryButton.vue";
import DangerButton from "@/Components/Auth/DangerButton.vue";
import SecondaryButton from "@/Components/Auth/SecondaryButton.vue";
import {ref} from "vue";

const props = defineProps({
    subcategory: {
        type: Object,
        flash: Object,
    },
});

const form = useForm({
    name: props.subcategory.name,
});

const isEditing = ref(false);

function startEdit() {
    isEditing.value = true;
}

const submit = () => {
    form.put(route('subcategories.update', props.subcategory.id));
    isEditing.value = false;
};

const cancelSave = () => {
    form.name = props.subcategory.name;
    isEditing.value = false;
}

const deleteSubcategory = () => {
    if (confirm(`Are you sure you want to delete the subcategory "${props.subcategory.name}"?`)) {
        form.delete(route('subcategories.destroy', props.subcategory.id), {
            onSuccess: (response) => {
                // Update the flash message with the value from the server response
                props.flash.success = response.flash.success;
                form.newSubcategory = '';

                // Use Inertia.js to visit the current page and load fresh data
                const {visit} = usePage();
                visit();
            },
            onError: (error) => {
                console.error(error);
            },
        });
    }
};
</script>

<template>
    <div class="flex text-xl border border-gray-100 hover:border-gray-300 rounded-lg p-1 mb-4" v-if="isEditing">
        <div class="grow h-10">
            <form
                @submit.prevent="submit"
                class="bg-gray-100 rounded flex p-4 h-full items-center"
            >
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                     class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                    <path d="M22 4L12 14.01l-3-3"></path>
                </svg>
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full text-xl title-font font-medium"
                    v-model="form.name"
                    @keydown.enter="submit"
                    @keydown.esc="cancelSave"
                    required
                    autofocus
                    autocomplete="name"
                />
            </form>
            <InputError class="mt-2" :message="form.errors.name"/>
        </div>
        <div class="flex-none mr-2">
            <PrimaryButton
                :disabled="form.processing"
                @click="submit"
            >
                Save
            </PrimaryButton>
        </div>
        <div class="flex-none mr-2">
            <SecondaryButton
                :disabled="form.processing"
                @click="cancelSave"
            >
                Cancel
            </SecondaryButton>
        </div>
    </div>

    <div class="flex text-xl border border-gray-100 hover:text-blue-800 rounded-lg p-1 mb-1" v-else>
        <div class="grow h-10">
            <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                     class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                    <path d="M22 4L12 14.01l-3-3"></path>
                </svg>
                <span class="title-font font-medium">{{ props.subcategory.name }}</span>
            </div>
        </div>
        <div class="flex-none mr-0">
            <PrimaryButton :disabled="form.processing" @click="startEdit()">
                edit
            </PrimaryButton>
        </div>
        <div class="flex-none mr-2">
            <DangerButton
                class="ml-3"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                @click="deleteSubcategory"
            >
                Delete
            </DangerButton>
        </div>
    </div>
</template>
