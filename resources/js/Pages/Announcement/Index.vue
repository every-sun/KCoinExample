<template>
    <ContentLayout>
        <div class="w-full">
            <div
                class="shadow-sm ring-1 ring-inset ring-gray-300 p-2 rounded-md flex flex-col gap-2 mb-4"
            >
                <div class="flex gap-2 items-center">
                    <label class="text-xs w-28">제목/내용</label>
                    <FilterInput placeholder="검색어를 입력하세요" />
                </div>

                <div class="flex gap-2 items-center">
                    <div class="flex-1 flex items-center justify-between">
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
            <PostTable :headers="headers">
                <TableBody
                    v-if="announcements.data.length > 0"
                    :data="announcements"
                />
                <p v-else class="text-gray-700 py-5 text-sm">
                    등록된 공지사항이 없습니다.
                </p>
            </PostTable>
            <PageController
                v-if="announcements.data.length > 0"
                :links="announcements.links"
                :currentPage="announcements.current_page"
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

const isAdmin = window.localStorage.getItem("role") === "admin";

const headers = isAdmin
    ? ["No", "제목", "등록일", "작성자", "", ""]
    : ["No", "제목", "등록일", "작성자"];
</script>
