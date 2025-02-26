import { defineStore } from "pinia";
import { ref } from "vue";

export const useCurrentPageStore = defineStore("currentPage", () => {
    const currentPage = ref("");
    const currentTabIdx = ref(0);

    const setPage = (type) => {
        currentPage.value = type;
    };

    const setTabIdx = (v) => {
        currentTabIdx.value = v;
    };

    return {
        currentPage,
        currentTabIdx,
        setPage,
        setTabIdx,
    };
});
