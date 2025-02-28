<template>
    <ContentLayout>
        <div>
            <div
                class="shadow-sm ring-1 ring-inset ring-gray-300 p-2 rounded-md flex flex-col gap-2 mb-4"
            >
                <div class="flex gap-2 items-center">
                    <!-- <label class="text-xs w-28">검색</label> -->
                    <DropDown
                        :items="sortOptions"
                        :value="sortValue"
                        :onSelect="onSort"
                    />
                    <FilterInput placeholder="검색어를 입력하세요" />
                </div>
                <div class="flex items-center">
                    <p class="text-xs w-28">구분</p>
                    <div class="flex-1 flex items-center justify-between">
                        <div
                            class="flex items-center gap-2 justify-center pl-2"
                        >
                            <input type="radio" id="all" name="role" checked />
                            <label for="all" class="text-xs mr-6"> 전체 </label>
                            <input type="radio" id="user" name="role" />
                            <label for="user" class="text-xs mr-6">
                                사용자
                            </label>
                            <input type="radio" id="admin" name="role" />
                            <label for="admin" class="text-xs"> 관리자 </label>
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
            <Table :headers="headers">
                <TableBody :data="users" />
            </Table>
            <PageController
                :links="users.links"
                :currentPage="users.current_page"
                :isScrollPreserve="true"
            />
        </div>
    </ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import OutlineButton from "@components/Button/OutlineButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import DropDown from "@components/DropDown.vue";
import FilterInput from "@components/FilterInput.vue";
import Layout from "@components/Layout.vue";
import PageController from "@components/PageController.vue";
import Table from "@components/Table.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { onMounted, ref } from "vue";
import TableBody from "./Components/TableBody.vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("admin-user");
    pageStore.setTabIdx(0);
});

const props = defineProps({
    users: {
        type: Object,
    },
});

const sortOptions = ["EP ID", "사원번호", "사원명", "이메일"];
const sortValue = ref(sortOptions[0]);

const onSort = (v) => {
    sortValue.value = v;
};

const headers = [
    "No",
    "사원번호",
    "사원명",
    "EP ID",
    "연락처",
    "이메일",
    "권한",
];
</script>
