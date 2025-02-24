import { defineStore } from "pinia";
import { ref } from "vue";

export const useConfirmModalStore = defineStore("confirmModal", () => {
    const isOpen = ref(false);
    const message = ref("");
    const agreeBtn = ref("");
    const cancelBtn = ref("");
    const onAgree = ref(() => {});

    const open = () => {
        isOpen.value = true;
    };
    const close = () => {
        isOpen.value = false;
    };
    const init = ({ text, func, agreeText = "확인", cancelText = "취소" }) => {
        message.value = text;
        onAgree.value = func;
        agreeBtn.value = agreeText;
        cancelBtn.value = cancelText;
    };
    return {
        isOpen,
        message,
        onAgree,
        agreeBtn,
        cancelBtn,
        open,
        close,
        init,
    };
});
