<template>
    <div
        class="w-full h-[80px] p-[24px] bg-white flex justify-between items-center fixed top-0 z-10 drop-shadow-sm"
    >
        <div class="flex gap-5">
            <button class="cursor-pointer" @click="toggleHamburger(true)">
                <Bars3Icon class="w-8" />
            </button>
            <button class="cursor-pointer" @click="router.visit('/')">
                로고
            </button>
        </div>
        <div class="flex gap-5 justify-between items-center">
            <ul class="flex gap-5 justify-between items-center">
                <Link
                    v-for="item in menus.filter((_, i) => i < 3)"
                    :key="item.label"
                    :href="item.url"
                    >{{ item.label }}</Link
                >
            </ul>
            <Link :href="route('login')">로그인</Link>
        </div>
    </div>
</template>
<script setup>
import { Bars3Icon } from "@heroicons/vue/24/outline";
import { Link, router } from "@inertiajs/vue3";
import { inject } from "vue";

const props = defineProps({
    toggleHamburger: Function,
});

const route = inject("route");

const menus = [
    { label: "K-Coin 사용", url: route("user.coin.use.index") },
    {
        label: "K-Coin 관리",
        url: route("user.coin.manage.index"),
    },
    { label: "문의 게시판", url: route("inquiry.index") },
];
</script>
