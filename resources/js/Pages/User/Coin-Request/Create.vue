<template>
    <ContentLayout>
        <form class="flex flex-col gap-5 flex-1" @submit.prevent="onSubmit">
            <div class="flex flex-col gap-1">
                <p class="text-xs text-gray-800 mb-1">파일 첨부</p>
                <label
                    for="file"
                    class="border-1 border-button text-button rounded-md cursor-pointer bg-white w-20 text-sm text-center"
                    >파일선택</label
                >
                <input type="file" id="file" class="hidden" />
            </div>
            <div class="flex flex-col gap-1">
                <label for="title" class="text-xs text-gray-800 mb-1"
                    >제목</label
                >
                <input
                    id="title"
                    class="bg-white p-1 ring-1 ring-gray-500 rounded-md"
                    v-model="form.title"
                />
            </div>
            <div class="flex flex-col gap-1">
                <label for="content" class="text-xs text-gray-800 mb-1"
                    >내용</label
                >
                <textarea
                    id="content"
                    class="bg-white p-1 ring-1 ring-gray-500 rounded-md resize-none"
                    rows="6"
                    v-model="form.content"
                ></textarea>
            </div>
            <FillButton class="py-1.5">신청</FillButton>
        </form>
    </ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import Layout from "@components/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import { useAlertModalStore } from "@store/alertModal";
import { useConfirmModalStore } from "@store/confilrModal";
import { useCurrentPageStore } from "@store/currentPage";
import { inject, onMounted } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("coin-request");
    pageStore.setTabIdx(0);
});

const route = inject("route");

const confirmModalStore = useConfirmModalStore();
const alertModalStore = useAlertModalStore();

const form = useForm({
    title: "",
    content: "",
});

const onSubmit = () => {
    confirmModalStore.init({
        text: `K-Coin을 신청하시겠습니까?`,
        func: () => {
            form.post(route("user.coin.request.store"), {
                onSuccess: () => {
                    alertModalStore.init({
                        text: "K-Coin을 신청하였습니다.",
                    });
                    alertModalStore.open();
                },
            });
        },
    });
    confirmModalStore.open();
};
</script>
