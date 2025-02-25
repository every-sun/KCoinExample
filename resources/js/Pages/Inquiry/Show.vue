<template>
    <ContentLayout :tabs="tabs" :current="tabs[0]">
        <div>
            <div class="flex gap-3 cursor-pointer" @click="onPrev">
                <ChevronLeftIcon class="w-6" />
                <h2 class="text-lg font-semibold">
                    {{ inquiry.title }}
                </h2>
            </div>
            <div class="pl-9 mt-2 flex items-center justify-between">
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
            <hr class="border-t-1 border-gray-400 my-4" />
            <p>
                {{ inquiry.content }}
            </p>
        </div>
    </ContentLayout>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import { ChevronLeftIcon } from "@heroicons/vue/24/outline";
import { router } from "@inertiajs/vue3";
import { useConfirmModalStore } from "@store/confilrModal";
import { useConverter } from "@utils/useConverter";
import { inject } from "vue";
import { inquiryTypes } from "./data";

const route = inject("route");

const props = defineProps({
    inquiry: {
        type: Object,
        requried: true,
    },
});

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
</script>
