<template>
    <ContentLayout
        ><form @submit.prevent="isEdit ? onUpdate() : onSubmit()">
            <div class="flex w-full mb-6 gap-15">
                <div v-if="form.image_url">
                    <img :src="form.image_url" class="w-80 h-full" />
                </div>
                <div v-else>
                    <label
                        for="image"
                        class="text-md mb-1 ring-1 ring-gray-300 w-80 h-full bg-gray-50 flex items-center justify-center cursor-pointer"
                    >
                        <p>상품 이미지</p>
                    </label>
                    <input type="file" id="image" class="hidden" />
                </div>
                <div class="flex flex-col gap-3 flex-1">
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
                        <label for="image" class="text-xs text-gray-800 mb-1"
                            >이미지 URL(임시)</label
                        >
                        <input
                            id="image"
                            class="bg-white p-1 ring-1 ring-gray-500 rounded-md"
                            v-model="form.image_url"
                        />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="category" class="text-xs text-gray-800 mb-1"
                            >카테고리</label
                        >
                        <div class="flex items-center gap-2">
                            <div
                                v-for="item in categories"
                                :key="item.id"
                                class="flex items-center gap-1"
                            >
                                <input
                                    name="category"
                                    type="radio"
                                    :id="item.id"
                                    :checked="
                                        form.category
                                            ? form.category === item.label
                                            : item.id === 'all'
                                    "
                                    :value="item.label"
                                    v-model="form.category"
                                    class="hidden peer"
                                />
                                <label
                                    :for="item.id"
                                    :class="[
                                        'bg-basic-gray text-[black] text-sm px-2 py-1 rounded-xl mr-6 peer-checked:bg-primary peer-checked:text-white',
                                    ]"
                                >
                                    {{ item.label }}
                                </label>
                            </div>
                        </div>
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

const categories = [
    {
        id: "all",
        label: "전체",
    },
    { id: "voucher", label: "상품권" },
    { id: "cafe", label: "카페" },
    { id: "food", label: "식품" },
    { id: "electronics", label: "전자제품" },
];

const form = useForm(
    isEdit
        ? {
              name: props.product.name,
              description: props.product.description,
              price: props.product.price,
              image_url: props.product.image_url,
              category: props.product.category,
          }
        : {
              name: null,
              description: null,
              price: 0,
              image_url: null,
              category: null,
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
