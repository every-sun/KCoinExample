<template>
    <ContentLayout>
        <div class="w-full">
            <div
                class="shadow-sm ring-1 ring-inset ring-gray-300 p-2 rounded-md flex flex-col gap-2 mb-4"
            >
                <div class="flex gap-2 items-center">
                    <label class="text-xs w-28">상품명</label>
                    <FilterInput />
                </div>
                <div class="flex gap-2 items-center">
                    <p class="text-xs w-28">신청날짜</p>
                    <div class="w-96 flex gap-2 items-center">
                        <input
                            type="date"
                            class="flex-1 bg-white ring-gray-300 ring-1 rounded-sm text-xs px-2 py-1 focus:outline-none"
                        />
                        ~
                        <input
                            type="date"
                            class="flex-1 bg-white ring-gray-300 ring-1 rounded-sm text-xs px-2 py-1 focus:outline-none"
                        />
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <p class="text-xs w-28">사용코인</p>
                    <div class="flex-1 flex items-center justify-between">
                        <div class="w-96 flex gap-2 items-center">
                            <FilterNumberInput />
                            <p>~</p>
                            <FilterNumberInput />
                        </div>
                        <div>
                            <OutlineButton class="text-xs px-8 py-1 mr-2"
                                >초기화</OutlineButton
                            >
                            <FillButton class="text-xs px-8 py-1"
                                >검색</FillButton
                            >
                        </div>
                    </div>
                </div>
            </div>
            <Table :headers="headers"
                ><TableBody :data="coin_requests"
            /></Table>
            <PageController
                :links="coin_requests.links"
                :currentPage="coin_requests.current_page"
                :isScrollPreserve="true"
            />
        </div>
    </ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import OutlineButton from "@components/Button/OutlineButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import FilterInput from "@components/FilterInput.vue";
import FilterNumberInput from "@components/FilterNumberInput.vue";
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
    pageStore.setPage("coin-manage");
    pageStore.setTabIdx(0);
});

const props = defineProps({
    coin_requests: {
        type: Object,
    },
});

const headers = [
    "No",
    "신청날짜",
    "상품명",
    "사용코인",
    "진행상태",
    "지급날짜",
    "취소신청날짜",
    "취소신청",
];
</script>
