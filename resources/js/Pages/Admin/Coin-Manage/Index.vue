<template>
    <ContentLayout><div>K코인 관리</div></ContentLayout>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Layout from "@components/Layout.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { onMounted } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("admin-coin-manage");
    pageStore.setTabIdx(0);
});
</script>
