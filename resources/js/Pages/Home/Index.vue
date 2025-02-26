<template>
    <div><Intro1 /></div>
</template>
<script setup>
import Layout from "@components/Layout.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { onMounted } from "vue";
import Intro1 from "./components/Intro1.vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("home");
    pageStore.setTabIdx(0);
});
</script>
