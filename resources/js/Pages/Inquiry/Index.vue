<template>
    <ContentLayout :tabs="tabs" :current="tabs[0]"
        ><div>
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

                <div class="flex items-center">
                    <p class="text-xs w-28">답변여부</p>
                    <div class="flex items-center gap-2 justify-center pl-2">
                        <input
                            type="radio"
                            id="completed"
                            name="answer"
                            checked
                        />
                        <label for="completed" class="text-xs mr-6">
                            답변 대기
                        </label>
                        <input type="radio" id="waiting" name="answer" />

                        <label for="waiting" class="text-xs"> 답변 완료 </label>
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <p class="text-xs w-28">문의유형</p>
                    <DropDown
                        :items="inquiryTypes.map((e) => e.label)"
                        :value="typeValue"
                        :onSelect="onTypeSelect"
                    />
                </div>
                <div class="flex gap-2 items-center">
                    <div class="flex-1 flex items-center justify-between">
                        <div class="w-96 flex gap-2 items-center"></div>
                        <FillButton title="검색" class="text-xs px-8 py-1" />
                    </div>
                </div>
            </div>
            <Table :headers="headers"><TableBody :data="inquiries" /></Table>
            <PageController
                :links="inquiries.links"
                :currentPage="inquiries.current_page"
                :isScrollPreserve="true"
            /></div
    ></ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import DropDown from "@components/DropDown.vue";
import FilterInput from "@components/FilterInput.vue";
import PageController from "@components/PageController.vue";
import Table from "@components/Table.vue";
import { inject, ref } from "vue";
import TableBody from "./Components/TableBody.vue";
import { inquiryTypes } from "./data";

const route = inject("route");

const props = defineProps({
    inquiries: Object,
});

const isAdmin = true;

const typeValue = ref(inquiryTypes[0].label);

const onTypeSelect = (v) => {
    inquiryTypes.find((e) => e.label === v);
    typeValue.value = v;
};

const tabs = [
    {
        title: "문의 게시판",
        url: route("inquiry.index"),
    },
    {
        title: "문의 작성",
        url: route("inquiry.create"),
    },
];

const headers = isAdmin
    ? ["No", "제목", "작성일", "작성자", "답변여부", ""]
    : ["No", "제목", "작성일", "작성자", "답변여부"];
</script>
