<script setup>

import AuthenticatedLayout from "@/Layouts/Auth/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {computed} from "vue";
import TextInput from "@/Components/Auth/TextInput.vue";
import PrimaryButton from "@/Components/Auth/PrimaryButton.vue";
import EditSubcategoryName from "@/Pages/Subcategories/Partials/EditSubcategoryName.vue";

const props = defineProps({
    categories: Object,
    subcategories: Object,
});

const form = useForm({
    categoryId: props.categories.id = 1,
    newSubcategory: null,
    editingSubcategoryName: null,
});

//Show the name of the selected category
const getCategoryName = computed(() => {
    const selectedCategory = props.categories.find(category => category.id === form.categoryId);
    return selectedCategory ? selectedCategory.name_en : '';
});

//Create subcategory
const create = () => {
    form.post(route('subcategories.store'), {
        data: {
            categoryId: form.categoryId,
            newSubcategory: form.newSubcategory
        },
        onSuccess: () => {
            form.newSubcategory = ''; // Сбросить поле ввода после успешного создания
        },
        onError: (errors) => {
            console.error(errors);
        },
    });
};

//Filtered subcategories list for show/edit
const filteredSubcategories = computed(() => {
    if (form.categoryId) {
        return props.subcategories.filter(
            (subcategory) => subcategory.category_id === parseInt(form.categoryId)
        );
    }
    return props.subcategories;
});


</script>

<template>
    <Head>
        <title>Seletra: Self-learning</title>
        <meta name="description" content="Show course page">
    </Head>

    <AuthenticatedLayout>
        <header
            class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 w-full text-center py-4"
        >

            <div class="flex ">
                <div class="flex-1">
                    <h1 class="text-white font-bold text-4xl">Select a category</h1>
                </div>
            </div>
        </header>

        <!--select categories-->
        <div class="flex flex-wrap text-gray-600 pb-10 pb-5">
            <select id="courseCategories"
                    name="courseCategories"
                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500
                            rounded-md shadow-sm mt-3 mb-3 hover:border-blue-700 text-lg title-font font-medium"
                    v-model="form.categoryId"

                    required
            >
                <option v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                >
                    {{ category.name_en }}
                </option>
            </select>
        </div>


        <!--create new subcategories-->
        <div class="pb-10">
            <div class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 w-full text-center py-2">
                <h1 class="text-white font-bold text-4xl">Create new subcategory for {{ getCategoryName }}</h1>
            </div>
            <span class="font-bold title-font text-red-700">Select a category and add a new subcategory: </span>
            <form @submit.prevent="create">
                <div class="flex text-xl">
                    <div class="grow h-14 title-font font-medium">
                        <TextInput
                            id="link"
                            name="name"
                            type="text"
                            class="mt-1 block w-full hover:border-blue-700"
                            v-model="form.newSubcategory"
                            required
                            autocomplete=""
                        />
                    </div>
                    <div class="flex-none w-20 h-14 ml-4 mr-4">
                        <PrimaryButton :disabled="form.processing">
                            Create
                        </PrimaryButton>
                    </div>
                </div>
            </form>
        </div>

        <!--edit users subcategories-->
        <div class="pb-10">
            <div class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 w-full text-center py-2 mb-4">
                <h1 class="text-white font-bold text-4xl">Subcategory list for {{ getCategoryName }}</h1>
            </div>
            <div
                id="subcategoriesList"
                v-for="subcategory in filteredSubcategories"
                :key="subcategory.id"
            >
                <EditSubcategoryName :subcategory="subcategory"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
