<script setup>

import {useForm} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import EditButtonGroup from "@/Components/Dashboard/EditButtonGroup.vue";

const props = defineProps({
    course: Object,
    courseCategory: Object,
    courseCategories: Object,
    showEdit: Boolean,
});

const form = useForm({
    category_id: props.course.category,
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
    form.category_id = props.course.category_id;
    isEditing.value = false;
}

onMounted(() => {
    form.category_id = props.course.category_id;
});
</script>

<template>
    <div class="flex">
        <div class=" flex-1 bg-white rounded-lg shadow-md h-full">
            <span class="font-bold text-blue-700">Category: </span>
            <template v-if="props.courseCategory.name_en">
                <span class="font-medium">{{ props.courseCategory.name_en }}</span>
            </template>
            <template v-else>
                <span class="font-medium">No category available</span>
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
        name="editCategory"
        @submit.prevent="submit"
        class="flex"
        v-if="isEditing">
        <div
            class=" flex-1 bg-white h-full"
            @keydown.esc="cancelEdit"
        >
            <div class="font-medium">
                <select id="courseCategories"
                        name="courseCategories"
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        v-model="form.category_id"

                        required
                >
                    <option disabled selected value="">Change course category</option>
                    <option v-for="category in courseCategories"
                            :key="category.id"
                            :value="category.id"
                            :selected="category.id === form.category_id"

                    >
                        {{ category.name_en }}
                    </option>
                </select>
            </div>
        </div>
    </form>
</template>
