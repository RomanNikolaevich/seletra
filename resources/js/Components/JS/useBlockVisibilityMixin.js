import { ref, computed } from "vue";

export const useBlockVisibilityMixin = () => {
    const isBlockVisible = ref(true);
    const toggleBlock = () => {
        isBlockVisible.value = !isBlockVisible.value;
    };
    const toggleButtonIcon = computed(() => {
        return isBlockVisible.value ? "far fa-square-minus" : "far fa-square-plus";
    });

    return {
        isBlockVisible,
        toggleBlock,
        toggleButtonIcon,
    };
};
