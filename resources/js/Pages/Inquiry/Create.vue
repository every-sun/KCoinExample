<template>
    <ContentLayout :tabs="tabs" :current="tabs[1]"
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
                title="수정"
                :class="'w-full py-2'"
                @click.prevent="onUpdate"
            />
            <FillButton
                v-else
                title="등록"
                :class="'w-full py-2'"
                @click.prevent="onSubmit"
            /></form
    ></ContentLayout>
</template>

<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import DropDown from "@components/DropDown.vue";
import { router, useForm } from "@inertiajs/vue3";
import { inject, ref } from "vue";
import { inquiryTypes } from "./data";

const route = inject("route");

const props = defineProps({
    inquiry: Object,
});

console.log(props.inquiry);

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
