<script setup>

import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    course: Object,
});

const form = useForm({
    favorites: props.course.favorites,
});

function toggleFavorites() {
    form.favorites = !form.favorites;
    form.put(route("courses.update", props.course.id));

    // const updateData = {
    //     favorites: form.favorites,
    // };
    //
    // // Отправляем запрос на обновление курса только с полем favorites
    // form.put(route("courses.update", props.course.id), updateData);
}
</script>

<template>
    <div class="bg-white rounded-lg shadow-md h-full">
        <form>
            <span class="font-bold text-blue-700 mr-3">Add to favorites: </span>
            <label class="cursor-pointer">
                <input type="checkbox"
                       v-model="form.favorites"
                       @click="toggleFavorites"
                       class="hidden"
                />
                <span v-if="course.favorites === false">
                   <font-awesome-icon :icon="['far', 'heart']" size="xl" style="color: #f50025;" />
                </span>
                <span v-else>
                    <font-awesome-icon :icon="['fas', 'heart']" size="xl" style="color: #f50025;" />
                </span>
            </label>
        </form>
    </div>
</template>
