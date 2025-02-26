<template>
    <ContentLayout
        ><form>
            <div class="flex w-full mb-6 gap-10">
                <div class="flex flex-col gap-5 flex-1">
                    <div class="">
                        <p class="text-xs text-gray-800 mb-1">문의 유형</p>
                        <DropDown
                            :items="inquiryTypes.map((e) => e.label)"
                            :value="typeValue"
                            :onSelect="onTypeSelect"
                        />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="title" class="text-xs text-gray-800 mb-1"
                            >문의 제목</label
                        >
                        <input
                            id="title"
                            class="bg-white p-1 ring-1 ring-gray-500 rounded-md"
                            v-model="form.title"
                        />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="content" class="text-xs text-gray-800 mb-1"
                            >문의 내용</label
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
            <FillButton
                v-if="inquiry"
                :class="'w-full py-2'"
                @click.prevent="onUpdate"
                >수정</FillButton
            >
            <FillButton v-else :class="'w-full py-2'" @click.prevent="onSubmit"
                >등록</FillButton
            >
        </form></ContentLayout
    >
</template>

<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import DropDown from "@components/DropDown.vue";
import Layout from "@components/Layout.vue";
import { router, useForm } from "@inertiajs/vue3";
import { useCurrentPageStore } from "@store/currentPage";
import { inject, onMounted, ref } from "vue";
import { inquiryTypes } from "./data";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("inquiry");
    pageStore.setTabIdx(1);
});

const route = inject("route");

const props = defineProps({
    inquiry: Object,
});

const form = useForm(
    props.inquiry
        ? {
              title: props.inquiry.title,
              content: props.inquiry.content,
              type: props.inquiry.type,
          }
        : {
              title: null,
              content: null,
              type: null,
          }
);

const typeValue = ref(
    props.inquiry?.type
        ? inquiryTypes.find((e) => e.value === props.inquiry.type).label
        : inquiryTypes[0].label
);
const onTypeSelect = (v) => {
    inquiryTypes.find((e) => e.label === v);
    typeValue.value = v;
};

const onSubmit = () => {
    form.type = inquiryTypes.find((e) => e.label === typeValue.value).value;
    form.post(route("inquiry.store"), {
        onSuccess: (res) => {
            router.visit(route("inquiry.index"), {
                replace: true,
            });
        },
    });
};

const onUpdate = () => {
    form.type = inquiryTypes.find((e) => e.label === typeValue.value).value;
    form.put(route("inquiry.update", props.inquiry.id), {
        onSuccess: (res) => {
            router.visit(route("inquiry.index"), {
                replace: true,
            });
        },
    });
};
</script>
