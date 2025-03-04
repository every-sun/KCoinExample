<template>
    <ContentLayout>
        <div class="flex"></div>
        <Table :headers="headers"><TableBody :data="coin_requests" /></Table>
        <PageController
            :links="coin_requests.links"
            :currentPage="coin_requests.current_page"
            :isScrollPreserve="true"
        />
    </ContentLayout>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Layout from "@components/Layout.vue";
import PageController from "@components/PageController.vue";
import Table from "@components/Table.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { onMounted } from "vue";
import TableBody from "./Components/TableBody.vue";
defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("coin-request");
    pageStore.setTabIdx(1);
});

const props = defineProps({
    coin_requests: {
        type: Object,
    },
});

const headers = ["No", "신청날짜", "제목", "진행상태", "승인날짜", "거부날짜"];
console.log(props.coin_requests);
</script>
