<script setup>

import {useForm} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import EditButtonGroup from "@/Components/Dashboard/EditButtonGroup.vue";

const props = defineProps({
    course: Object,
    courseType: Object,
    courseTypes: Object,
    showEdit: Boolean,
});

const form = useForm({
    type_id: props.course.type,
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
    form.type_id = props.course.type_id;
    isEditing.value = false;
}

onMounted(() => {
    form.type_id = props.course.type_id;
});
</script>

<template>
    <div class="flex">
        <div class=" flex-1 bg-white rounded-lg shadow-md h-full">
            <span class="font-bold text-blue-700">Type: </span>
            <template v-if="props.courseType.name_en">
                <span class="font-medium">{{ props.courseType.name_en }}</span>
            </template>
            <template v-else>
                <span class="font-medium">No type available</span>
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
        name="edittype"
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
                        v-model="form.type_id"
                        required
                >
                    <option disabled selected value="">Change course type</option>
                    <option v-for="type in courseTypes"
                            :key="type.id"
                            :value="type.id"
                            :selected="type.id === form.type_id"
                    >
                        {{ type.name_en }}
                    </option>
                </select>
            </div>
        </div>
    </form>
</template>
