<script setup>

import {useForm} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import EditButtonGroup from "@/Components/Dashboard/EditButtonGroup.vue";
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    course: Object,
    courseCategory: Object,
    courseCategories: Object,
    courseSubcategoriesChecked: Object,
    courseSubcategoriesAll: Object,
    showEdit: Boolean,
});

const selectedSubcategories = ref(
    props.courseSubcategoriesChecked.map((subcategory) => subcategory.id)
);

const form = useForm({
    // categoryId: props.courseCategory.id = 1,
    checkedSubcategory: selectedSubcategories,
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
    form.checkedSubcategory = props.courseSubcategoriesChecked.map(
        (subcategory) => subcategory.id
    );
    isEditing.value = false;
};

// const filteredSubcategories = computed(() => {
//     if (form.categoryId) {
//         return props.subcategories.filter(
//             (subcategory) => subcategory.category_id === parseInt(form.categoryId)
//         );
//     }
//     return props.courseSubcategoriesAll;
// });
</script>

<template>
    <div class="flex">
        <div class="flex-1 bg-white rounded-lg shadow-md h-full flex flex-wrap" id="subcategoriesListShow">
            <span class="font-bold text-blue-700">Subcategory: </span>
            <template v-if="courseSubcategoriesChecked.length > 0">
                <div
                    v-for="subcategoryChecked in courseSubcategoriesChecked"
                    :key="subcategoryChecked.id"
                    class="inline-block ml-1"
                >
                    {{ subcategoryChecked.name }},
                </div>
            </template>

            <template v-else>
                <div class="inline-block ml-1">
                    No subcategories available
                </div>
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
<!--    {{ courseSubcategoriesChecked }}-->
    <form
        name="editSubcategory"
        @submit.prevent="submit"
        class="flex"
        v-if="isEditing">
        <div
            class=" flex-1 bg-white h-full"
            @keydown.esc="cancelEdit"
        >
            <div class="flex flex-wrap">
                <div
                    id="subcategoriesListEdit"
                    v-for="subcategory in courseSubcategoriesAll"
                    :key="subcategory.id"
                >
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                        <label
                            class="cursor-pointer"
                        >
                            <input
                                type="checkbox"
                                v-model="form.checkedSubcategory"
                                :value="subcategory.id"
                            >
                            <span class="title-font font-medium ml-1">{{ subcategory.name }}</span>
                        </label>
                    </div>
                </div>
            </div>
            <Link
                :href="route('subcategories.index')"
                class="hover:text-blue-700 hover:font-bold underline"
            >
                Manage subcategories
            </Link>
        </div>
    </form>
</template>
