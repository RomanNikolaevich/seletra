<script setup>

import {computed, defineProps, onMounted} from "vue";

const props = defineProps({
    flash: Object,
});

const show = computed(() => {
    return props.flash.success !== null;
});

onMounted(() => {
    setTimeout(() => {
        hideAlert();
    }, 4000);
});

const hideAlert = () => {
    props.flash.success = null;
};
</script>

<template>
    <div v-if="show" class="alert alert-warning">
        {{ props.flash.success }}
        <button @click="hideAlert" class="close-btn">&times;</button>
    </div>
</template>

<style scoped>
.alert {
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 0.25rem;
    color: #0b5b07;
    background-color: #8ae740;
    border-color: #8ae740;
    position: relative;
}

.alert.alert-warning {
    color: #0b5b07;
    background-color: #8ae740;
    border-color: #8ae740;
}

.alert .close-btn {
    position: absolute;
    top: 0;
    right: 0;
    padding: 0.5rem 1rem;
    background-color: transparent;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
}

.close-btn:hover {
    color: red;
}
</style>
