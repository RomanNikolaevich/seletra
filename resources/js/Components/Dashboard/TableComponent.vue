<!--<script setup>-->
<!--import { defineProps } from 'vue';-->

<!--export default {-->
<!--    props: {-->
<!--        courses: Array // Замените Array на тип, соответствующий вашим данным в пропсе courses-->
<!--    }-->
<!--};-->
<!--</script>-->

<template>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Link</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="course in courses" :key="course.id">
            <td>{{ course.id }}</td>
            <td>{{ course.name }}</td>
            <td>{{ course.link }}</td>
            <td>{{ course.status }}</td>
        </tr>
        </tbody>
    </table>
</template>

<style scoped>

</style>
