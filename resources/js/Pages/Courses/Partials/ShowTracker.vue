<script setup>

import CourseShowHeader from "@/Components/Dashboard/CourseShowHeader.vue";
import {useBlockVisibilityMixin} from "@/Components/JS/useBlockVisibilityMixin.js";

const { isBlockVisible, toggleBlock, toggleButtonIcon } = useBlockVisibilityMixin();
</script>

<template>
    <section class="mb-4">
        <CourseShowHeader
            :toggleBlock ="toggleBlock"
            :toggleButtonIcon="toggleButtonIcon"
        >
            <template #headerName>
                Course tracker
            </template>
        </CourseShowHeader>

        <div v-show="isBlockVisible" class="flex flex-wrap text-gray-600 text-lg">
            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Training timer: </span>
                    <span class="font-medium"> {{ }}</span>
                    <!--                    <button class="px-4 py-2 rounded-md bg-blue-700 text-white">Start/Stop</button>-->
                </div>
            </div>

            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Current lesson: </span>
                    <span class="font-medium"> {{ }}</span>
                    ...
                </div>
            </div>

            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Duration (time or lessons): </span>
                    <!--                    <template v-if="">-->
                    <!--                        <span class="font-medium"></span>-->
                    <!--                    </template>-->
                    <!--                    <template v-else>-->
                    <!--                        <span class="font-medium">No subcategory available</span>-->
                    <!--                    </template>-->
                </div>
            </div>

            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Заметки к уроку: </span>

                </div>
            </div>
        </div>
    </section>
</template>
