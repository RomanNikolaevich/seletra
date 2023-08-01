<script setup>

const props = defineProps({
    toggleBlock: Function,
    handleShowEditChange: Function,
    toggleButtonIcon: String,
});

</script>

<template>

    <header
        class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 w-full text-center py-4 mb-3"
    >
        <div class="flex items-center justify-center">
            <div v-if="typeof toggleBlock === 'function'" class="flex-none w-14">
                <button @click="toggleBlock">
                    <font-awesome-icon
                        :icon="toggleButtonIcon"
                        size="xl"
                        style="color: #f2f4f8;"
                    />
                </button>
            </div>
            <div class="grow ">
                <h1 class="text-white font-bold text-4xl"> <slot name="headerName"></slot></h1>
            </div>
            <div v-if="typeof handleShowEditChange === 'function'"
                 class="flex items-center justify-center h-full w-30">
                <button @click="handleShowEditChange" class="ml-4 mr-4">
                    <font-awesome-icon
                        :icon="['fas', 'ellipsis-vertical']"
                        size="xl"
                        style="color: #f3f4f7;"
                    />
                </button>
            </div>
        </div>
    </header>
</template>
