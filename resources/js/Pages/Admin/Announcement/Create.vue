<template>
    <ContentLayout
        ><form @submit.prevent="isEdit ? onUpdate() : onSubmit()">
            <div class="flex w-full mb-6 gap-10">
                <div class="flex flex-col gap-5 flex-1">
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
                            rows="12"
                            v-model="form.content"
                        ></textarea>
                    </div>
                </div>
            </div>
            <FillButton :class="'w-full py-2'" type="submit">{{
                isEdit ? "수정" : "등록"
            }}</FillButton>
        </form></ContentLayout
    >
</template>

<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import Layout from "@components/Layout.vue";
import { router, useForm } from "@inertiajs/vue3";
import { useCurrentPageStore } from "@store/currentPage";
import { inject, onMounted } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("announcement");
    pageStore.setTabIdx(1);
});

const route = inject("route");

const props = defineProps({
    announcement: Object,
});

const isEdit = props.announcement !== undefined;

const form = useForm(
    isEdit
        ? {
              title: props.announcement.title,
              content: props.announcement.content,
          }
        : {
              title: null,
              content: null,
          }
);

const onSubmit = () => {
    form.post(route("admin.announcement.store"), {
        onSuccess: (res) => {
            router.visit(route("announcement.index"), {
                replace: true,
            });
        },
    });
};

const onUpdate = () => {
    form.put(route("admin.announcement.update", props.announcement.id), {
        onSuccess: (res) => {
            router.visit(route("announcement.index"), {
                replace: true,
            });
        },
    });
};
</script>
