<template>
    <ContentLayout title="코인 적립 내역">
        <div
            class="shadow-sm ring-1 ring-inset ring-gray-300 p-2 rounded-md flex flex-col gap-2 mb-4"
        >
            <div class="flex gap-2 items-center">
                <label class="text-xs w-28">상세내용</label>
                <FilterInput placeholder="검색어를 입력하세요" />
            </div>
            <div class="flex gap-2 items-center">
                <p class="text-xs w-28">날짜</p>
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
                <p class="text-xs w-28">코인</p>
                <div class="flex-1 flex items-center justify-between">
                    <div class="w-96 flex gap-2 items-center">
                        <FilterNumberInput />
                        <p>~</p>
                        <FilterNumberInput />
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <p class="text-xs w-28">구분</p>
                <div class="flex-1 flex items-center justify-between">
                    <div class="flex items-center gap-2 justify-center pl-2">
                        <input type="radio" id="all" name="role" checked />
                        <label for="all" class="text-xs mr-6"> 전체 </label>
                        <input type="radio" id="user" name="role" />
                        <label for="user" class="text-xs mr-6"> 적립 </label>
                        <input type="radio" id="admin" name="role" />
                        <label for="admin" class="text-xs"> 사용 </label>
                    </div>
                    <div>
                        <OutlineButton class="text-xs px-8 py-1 mr-2"
                            >초기화</OutlineButton
                        >
                        <FillButton class="text-xs px-8 py-1">검색</FillButton>
                    </div>
                </div>
            </div>
        </div>
        <Table :headers="headers"><TableBody :data="coins" /></Table>
        <PageController
            :links="coins.links"
            :currentPage="coins.current_page"
            :isScrollPreserve="true"
        />
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
    pageStore.setPage("coin-history");
});

const props = defineProps({
    coins: {
        type: Object,
    },
});

const headers = ["No", "적립날짜", "사용날짜", "코인", "상세"];
console.log(props.coins);
</script>
