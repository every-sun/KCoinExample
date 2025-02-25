<template>
    <ContentLayout :tabs="tabs" :current="tabs[0]">
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
                        <FillButton title="검색" class="text-xs px-8 py-1" />
                    </div>
                </div>
            </div>
            <Table :headers="headers"
                ><TableBody :data="announcements"
            /></Table>
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
import PageController from "@components/PageController.vue";
import Table from "@components/Table.vue";
import { inject } from "vue";
import TableBody from "./Components/TableBody.vue";

const route = inject("route");

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

const tabs = [
    {
        title: "공지사항",
        url: route("announcement.index"),
    },
    {
        title: "공지사항 등록",
        url: route("admin.announcement.create"),
    },
];
</script>
