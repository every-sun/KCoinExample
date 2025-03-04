<template>
    <ContentLayout>
        <div>
            <div class="flex gap-3 cursor-pointer" @click="onPrev">
                <ChevronLeftIcon class="w-6" />
                <h2 class="text-lg font-semibold">
                    {{ inquiry.title }}
                </h2>
            </div>
            <div
                class="pl-9 mt-2 flex items-center justify-between border-b-1 border-gray-600 my-4 pb-4"
            >
                <div class="flex items-center gap-8">
                    <div>
                        <span class="text-sm font-semibold mr-2">문의유형</span>
                        <span class="text-sm">
                            {{
                                inquiryTypes.find(
                                    (e) => e.value === inquiry.type
                                ).label
                            }}
                        </span>
                    </div>
                    <div>
                        <span class="text-sm font-semibold mr-2">작성자</span>
                        <span class="text-sm">작성자명</span>
                    </div>
                    <div>
                        <span class="text-sm font-semibold mr-2">문의날짜</span>
                        <span class="text-sm">{{
                            timestampToDate(inquiry.created_at)
                        }}</span>
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <button
                        class="cursor-pointer text-sm"
                        @click="onEdit(inquiry.id)"
                    >
                        수정</button
                    ><button
                        class="cursor-pointer text-sm"
                        @click="onDelete(inquiry.id)"
                    >
                        삭제
                    </button>
                </div>
            </div>
            <p>
                {{ inquiry.content }}
            </p>
        </div>
        <div
            v-if="inquiry.answers?.length > 0"
            class="border-t-1 border-gray-600 mt-10 pt-4 ml-3 flex flex-col gap-3"
        >
            <p class="font-semibold text-sm">답변</p>
            <div
                v-for="item in inquiry.answers"
                :key="item.id"
                class="flex flex-col"
            >
                <div class="flex gap-2 items-center">
                    <p class="text-sm">관리자</p>
                    <p class="text-xs">
                        {{ timestampToDate(item.created_at) }}
                    </p>
                </div>
                <p>{{ item.content }}</p>
            </div>
        </div>
        <AnswerForm :id="inquiry.id" v-if="isAdmin" />
    </ContentLayout>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Layout from "@components/Layout.vue";
import { ChevronLeftIcon } from "@heroicons/vue/24/solid";
import { router } from "@inertiajs/vue3";
import { useConfirmModalStore } from "@store/confilrModal";
import { useCurrentPageStore } from "@store/currentPage";
import { useConverter } from "@utils/useConverter";
import { inject, onMounted } from "vue";
import AnswerForm from "./Components/AnswerForm.vue";
import { inquiryTypes } from "./data";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("inquiry");
    pageStore.setTabIdx(0);
});

const route = inject("route");

const props = defineProps({
    inquiry: {
        type: Object,
        requried: true,
    },
});

const isAdmin = window.localStorage.getItem("role") === "admin";

const confirmModalStore = useConfirmModalStore();
const { timestampToDate } = useConverter();

const onPrev = () => {
    window.history.back();
};

const onDelete = (id) => {
    confirmModalStore.init({
        text: "삭제하시겠습니까?",
        func: () => {
            router.delete(route("inquiry.destroy", id));
        },
        agreeText: "삭제",
    });
    confirmModalStore.open();
};

const onEdit = (id) => {
    router.visit(route("inquiry.edit", id));
};
</script>
