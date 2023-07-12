<script setup>

import AuthenticatedLayout from "@/Layouts/Auth/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/Auth/InputLabel.vue";
import TextInput from "@/Components/Auth/TextInput.vue";
import InputError from "@/Components/Auth/InputError.vue";
import PrimaryButton from "@/Components/Auth/PrimaryButton.vue";

defineProps({
    courseTypes: Object,
    courseCategories: Object,
});

const form = useForm({
    name: '',
    link: '',
    description: '',
    courseTypes: '',
    courseCategories: '',
});

const submit = () => {
    form.post(route('courses.store'));
};

</script>

<template>
    <Head>
        <title>Seletra: Create new course</title>
        <meta name="description" content="Create new course">
    </Head>

    <AuthenticatedLayout>
        <header
            class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 w-full text-center py-4"
        >
            <h1 class="text-white font-bold text-4xl">Create new course</h1>
        </header>

        <form @submit.prevent="submit">

            <!--Name -->
            <div>
                <InputLabel for="name" value="Name"/>

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete=""
                />

                <InputError class="mt-2" :message="form.errors.name"/>
            </div>

            <!--Link -->
            <div class="mt-4">
                <InputLabel for="link" value="Link"/>

                <TextInput
                    id="link"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.link"
                    required
                    autocomplete=""
                />

                <InputError class="mt-2" :message="form.errors.link"/>
            </div>

            <!--Description -->
            <div class="mt-4">
                <InputLabel for="description" value="Description"/>

                <textarea id="description"
                          name="description"
                          class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                          v-model="form.description"
                          required
                />

                <InputError class="mt-2" :message="form.errors.description"/>
            </div>

            <!--Types -->
            <div class="mt-4">
                <InputLabel for="courseTypes" value="Specify how you will obtain information for the study"/>

                <select id="courseCategories"
                        name="courseCategories"
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        v-model="form.courseTypes"
                        required
                >
                    <option disabled selected>Choose course category</option>
                    <option v-for="type in courseTypes"
                            :key="type.id"
                            :value="type.id"
                    >
                        {{ type.name_en }}
                    </option>
                </select>
            </div>

            <!--Categories-->
            <div class="mt-4">
                <InputLabel for="courseCategories" value="Specify which category of knowledge you will study"/>

                <select id="courseCategories"
                        name="courseCategories"
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        v-model="form.courseCategories"
                        required
                >
                    <option disabled selected>Choose course category</option>
                    <option v-for="category in courseCategories"
                            :key="category.id"
                            :value="category.id"
                    >
                        {{ category.name_en }}
                    </option>
                </select>
            </div>

            <!--button -->
            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4"
                               :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Create
                </PrimaryButton>
            </div>
        </form>

    </AuthenticatedLayout>
</template>
