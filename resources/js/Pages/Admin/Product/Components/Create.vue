<template>
    <form @submit.prevent="onSubmit">
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
                    <label for="description" class="text-xs text-gray-800 mb-1"
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
        <FillButton title="등록" :class="'w-full py-2'" />
    </form>
</template>

<script setup>
import FillButton from "@components/Button/FillButton.vue";
import { router, useForm } from "@inertiajs/vue3";
import { inject } from "vue";

const route = inject("route");

const form = useForm({
    name: null,
    description: null,
    price: 0,
});

const onSubmit = () => {
    form.post(route("admin.product.store"), {
        onSuccess: () => {
            router.visit(route("admin.product.manage.index"));
        },
    });
};
</script>
