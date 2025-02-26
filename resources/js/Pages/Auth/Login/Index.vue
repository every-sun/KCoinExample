<template>
    <div
        class="w-full min-h-[100vh] pt-[80px] flex flex-col items-center justify-center"
    >
        <h3 class="mb-10">로그인</h3>
        <form class="w-80">
            <label
                for="id"
                class="absolute -top-2 left-2 inline-block rounded-lg bg-white px-1 text-xs font-medium text-gray-900"
                >Name</label
            >
            <input
                type="text"
                name="id"
                id="id"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mb-2"
                placeholder="ID"
            />
            <label
                for="password"
                class="absolute -top-2 left-2 inline-block rounded-lg bg-white px-1 text-xs font-medium text-gray-900"
                >Name</label
            >
            <input
                type="text"
                name="password"
                id="password"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                placeholder="Password"
            />
            <FillButton class="w-full mt-10 py-2">로그인</FillButton>
        </form>
    </div>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import Layout from "@components/Layout.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { onMounted } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("login");
    pageStore.setTabIdx(0);
});
</script>
