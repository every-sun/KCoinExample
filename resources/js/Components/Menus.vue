<template>
    <div class="text-white flex flex-col pt-5 gap-1">
        <Link
            :href="item.url"
            :class="[
                'text-white py-4 px-3 text-sm cursor-pointer',
                url === item.url && 'bg-secondary rounded-md',
            ]"
            v-for="item in menus"
            :key="item.label"
        >
            {{ item.label }}
        </Link>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import { inject } from "vue";

const url = window.location.href.split("?page=")[0];

const route = inject("route");

const menus = [
    { label: "K-Coin 사용", role: "user", url: route("user.coin.use.index") },
    {
        label: "K-Coin 관리",
        role: "user",
        url: route("user.coin.manage.index"),
    },
    { label: "문의 게시판", role: "user", url: route("inquiry.index") },
    { label: "공지사항", role: "user", url: route("announcement.index") },
    { label: "상품 관리", role: "admin", url: route("admin.product.index") },
    { label: "K-Coin 관리", role: "admin", url: route("admin.coin.index") },
];
</script>
