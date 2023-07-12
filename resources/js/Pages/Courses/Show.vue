<script setup>

import AuthenticatedLayout from "@/Layouts/Auth/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import CourseType from "@/Components/Dashboard/CourseType.vue";
import CourseStatusComponent from "@/Components/Dashboard/CourseStatus.vue";

defineProps({
    course: Object,
    courseCategory: Object,
    courseType: Object,
    courseStatus: Object,
});

const formatDateTime = (dateTime) => {
    const options = {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
    };
    return new Date(dateTime).toLocaleString(undefined, options);
};
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
            <h1 class="text-white font-bold text-4xl">Course #{{ course.id }} - {{ course.name }}</h1>
        </header>


        <div class="flex flex-wrap text-gray-600">

            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Course link: </span>
                    <a href="{{ course.link }}" target="_blank" class="font-medium text-grey-400">Go to Course</a>
                </div>
            </div>
            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Description: </span>
                    <template v-if="course.description">
                        <span class="font-medium">{{ course.description }}</span>
                    </template>
                    <template v-else>
                        <span class="font-medium">No description available</span>
                    </template>

                </div>
            </div>

            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Category:  </span>
                    <span class="font-medium">{{ courseCategory.name_en }} </span>
                </div>
            </div>
            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Subcategory:  </span>
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
                    <span class="font-bold text-blue-700">Course type </span>
                    <span class="sm:tooltip" data-tip="How is obtained">
                    <font-awesome-icon icon="fa-solid fa-circle-info" style="color: #115ee4;"/>
                </span>:
                    <span class="font-medium">
                        <CourseType :courseType="course.type"/> {{ courseType.name_en }}
                    </span>
                </div>
            </div>
            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Course status:  </span>
                    <span class="font-medium">
                        <CourseStatusComponent :courseStatus="courseStatus"/>
                    </span>
                    <!--                    <button class="px-4 py-2 rounded-md bg-blue-500 text-white ml-2">Change status</button>-->
                </div>
            </div>

            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Added:   </span>
                    <span class="font-medium">{{ formatDateTime(course.created_at) }} </span>
                </div>
            </div>
            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <span class="font-bold text-blue-700">Started:   </span>
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
                    <span class="font-bold text-blue-700">Completed: </span>
                    <template v-if="course.completion_at">
                        <span class="font-medium">{{ formatDateTime(course.completion_at) }}</span>
                    </template>
                    <template v-else>
                        <span class="font-medium">Course not completed yet.</span>
                    </template>
                </div>
            </div>


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

                </div>
            </div>

            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">
                    <!-- Содержимое блока -->
                </div>
            </div>
            <div class="flex-grow w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 mb-2">
                <div class="bg-white rounded-lg shadow-md h-full">

                    <template v-if="course.favorites === 0">
                        <span class="font-bold text-blue-700">Not added to favorites: </span>
                        <input type="checkbox" class="form-checkbox mr-2"/>
                    </template>
                    <template v-else>
                        <span class="font-bold text-blue-700">Was added to favorites: </span>
                        <input type="checkbox" checked="checked" class="form-checkbox mr-2"/>
                    </template>

                    <div class="mb-4">

                    </div>
                </div>
            </div>

        </div>


        <div
            class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 w-full text-center py-2"
        >
            <h1 class="text-white font-bold text-4xl">History of lessons</h1>
        </div>
        <!--                    <template v-if="">-->
        <!--                        <span class="font-medium"></span>-->
        <!--                    </template>-->
        <!--                    <template v-else>-->
        <!--                        <span class="font-medium">No subcategory available</span>-->
        <!--                    </template>-->
        <div>
            Your history is empty
        </div>

    </AuthenticatedLayout>
</template>
