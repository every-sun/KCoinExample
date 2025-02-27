<template><ContentLayout> 사용자관리 </ContentLayout></template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Layout from "@components/Layout.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { inject, onMounted } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("admin-user");
    pageStore.setTabIdx(0);
});

const route = inject("route");

// const props = defineProps({
//     users: {
//         type: Object,
//     },
// });
</script>
