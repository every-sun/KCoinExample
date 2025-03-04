import { defineStore } from "pinia";
import { ref } from "vue";

export const useAlertModalStore = defineStore("alertModal", () => {
    const isOpen = ref(false);
    const message = ref("");

    const open = () => {
        isOpen.value = true;
    };
    const close = () => {
        isOpen.value = false;
    };
    const init = ({ text }) => {
        message.value = text;
    };
    return {
        isOpen,
        message,
        open,
        close,
        init,
    };
});
