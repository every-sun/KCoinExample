<template>
    <div class="w-full">
        <div
            class="shadow-sm ring-1 ring-inset ring-gray-300 p-2 rounded-md flex flex-col gap-2 mb-4"
        >
            <div class="flex gap-2 items-center">
                <label for="name" class="text-xs w-28">제목</label>
                <FilterInput />
            </div>
            <div class="flex gap-2 items-center">
                <label for="name" class="text-xs w-28">내용</label>
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
        <Table :tbodyComp="TableBody" :headers="headers" :data="data"></Table>
        <PageController
            :links="data.links"
            :currentPage="data.current_page"
            :isScrollPreserve="true"
        />
    </div>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import FilterInput from "@components/FilterInput.vue";
import PageController from "@components/PageController.vue";
import Table from "@components/Table.vue";
import TableBody from "./TableBody.vue";

const props = defineProps({
    data: {
        type: Object,
        requried: true,
    },
});

const isAdmin = true;

const headers = isAdmin
    ? ["No", "제목", "등록일", "작성자", "", ""]
    : ["No", "제목", "등록일", "작성자"];
</script>
