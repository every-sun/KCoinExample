<template>
    <ContentLayout
        ><form @submit.prevent="isEdit ? onUpdate() : onSubmit()">
            <div class="flex w-full mb-6 gap-10">
                <div>
                    <label
                        for="image"
                        class="text-md mb-1 ring-1 ring-gray-300 w-80 h-full bg-gray-50 flex items-center justify-center cursor-pointer"
                    >
                        <p>상품 이미지</p>
                    </label>
                    <input type="file" id="image" class="hidden" />
                </div>
                <div class="flex flex-col gap-5 flex-1">
                    <div class="flex flex-col gap-1">
                        <label for="name" class="text-xs text-gray-800 mb-1"
                            >상품명</label
                        >
                        <input
                            id="name"
                            class="bg-white p-1 ring-1 ring-gray-500 rounded-md"
                            v-model="form.name"
                        />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label
                            for="description"
                            class="text-xs text-gray-800 mb-1"
                            >설명</label
                        >
                        <textarea
                            id="description"
                            class="bg-white p-1 ring-1 ring-gray-500 rounded-md resize-none"
                            rows="6"
                            v-model="form.description"
                        ></textarea>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="price" class="text-xs text-gray-800 mb-1"
                            >코인</label
                        >
                        <input
                            id="price"
                            type="number"
                            min="0"
                            class="bg-white p-1 ring-1 ring-gray-500 rounded-md"
                            v-model="form.price"
                        />
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
    pageStore.setPage("product-manage");
    pageStore.setTabIdx(1);
});

const route = inject("route");

const props = defineProps({
    product: {
        type: Object,
    },
});

const isEdit = props.product !== undefined;

const form = useForm(
    isEdit
        ? {
              name: props.product.name,
              description: props.product.description,
              price: props.product.price,
          }
        : {
              name: null,
              description: null,
              price: 0,
          }
);

const onSubmit = () => {
    form.post(route("admin.product.store"), {
        onSuccess: () => {
            router.visit(route("admin.product.index"));
        },
    });
};

const onUpdate = () => {
    form.put(route("admin.product.update", props.product.id), {
        onSuccess: () => {
            router.visit(route("admin.product.index"));
        },
    });
};
</script>
