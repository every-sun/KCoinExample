<template>
    <ContentLayout title="코인 적립 내역"></ContentLayout>
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
    pageStore.setPage("coin-history");
});
</script>
