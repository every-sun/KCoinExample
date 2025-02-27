<template>
    <ContentLayout>
        <div class="w-full">
            <div
                class="shadow-sm ring-1 ring-inset ring-gray-300 p-2 rounded-md flex flex-col gap-2 mb-4"
            >
                <div class="flex gap-2 items-center">
                    <label class="text-xs w-28">제목</label>
                    <FilterInput />
                </div>
                <div class="flex gap-2 items-center">
                    <label class="text-xs w-28">내용</label>
                    <FilterInput />
                </div>
                <div class="flex gap-2 items-center">
                    <p class="text-xs w-28">등록일</p>
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
                    <div class="flex-1 flex items-center justify-between">
                        <div class="w-96 flex gap-2 items-center"></div>
                        <FillButton class="text-xs px-8 py-1">검색</FillButton>
                    </div>
                </div>
            </div>
            <PostTable :headers="headers"
                ><TableBody :data="announcements"
            /></PostTable>
            <PageController
                :links="announcements.links"
                :currentPage="announcements.current_page"
                :isScrollPreserve="true"
            />
        </div>
    </ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import FilterInput from "@components/FilterInput.vue";
import Layout from "@components/Layout.vue";
import PageController from "@components/PageController.vue";
import PostTable from "@components/PostTable.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { onMounted } from "vue";
import TableBody from "./Components/TableBody.vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("announcement");
    pageStore.setTabIdx(0);
});

const props = defineProps({
    announcements: {
        type: Object,
        requried: true,
    },
});

const isAdmin = true;

const headers = isAdmin
    ? ["No", "제목", "등록일", "작성자", "", ""]
    : ["No", "제목", "등록일", "작성자"];
</script>
