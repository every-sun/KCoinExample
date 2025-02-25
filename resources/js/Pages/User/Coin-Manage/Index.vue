<template>
    <ContentLayout :tabs="tabs" :current="tabs[0]">
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
                        <FillButton title="검색" class="text-xs px-8 py-1" />
                    </div>
                </div>
            </div>
            <Table :headers="headers"><TableBody /></Table>
        </div>
    </ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import FilterInput from "@components/FilterInput.vue";
import FilterNumberInput from "@components/FilterNumberInput.vue";
import Table from "@components/Table.vue";
import { inject } from "vue";
import TableBody from "./Components/TableBody.vue";

const route = inject("route");

const headers = [
    "No.",
    "날짜",
    "상품명",
    "사용코인",
    "진행상태",
    "지급날짜",
    "취소날짜",
    "취소신청",
];

const tabs = [
    {
        title: "K-Coin 관리",
        url: route("user.coin.manage.index"),
    },
];
</script>
