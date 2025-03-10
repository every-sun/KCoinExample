<template>
    <div class="w-full">
        <div class="bg-[#F3F4F8] pt-[150px] px-10 border-b-1 border-gray-300">
            <p v-if="title" class="font-semibold text-2xl mb-4">
                {{ title }}
            </p>
            <p
                class="font-semibold text-2xl mb-4"
                v-else-if="
                    pageStore.currentPage &&
                    pageStore.currentTabIdx >= 0 &&
                    tabs[pageStore.currentPage]
                "
            >
                {{
                    tabs[pageStore.currentPage][pageStore.currentTabIdx]?.title
                }}
            </p>
            <div class="flex gap-8">
                <Link
                    v-for="(item, i) in tabs[pageStore.currentPage]"
                    :href="item.url"
                    :key="item.title"
                    :class="[
                        'border-b-4 cursor-pointer py-2',
                        i === pageStore.currentTabIdx
                            ? 'border-b-secondary text-secondary'
                            : 'border-b-transparent',
                    ]"
                >
                    {{ item.title }}
                </Link>
            </div>
        </div>
        <div class="w-full px-10 py-10"><slot></slot></div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import { inject } from "vue";
import { useCurrentPageStore } from "../store/currentPage";

const props = defineProps({
    title: String,
});

const pageStore = useCurrentPageStore();

const route = inject("route");

const isAdmin = window.localStorage.getItem("role") === "admin";

const tabs = {
    "coin-request": [
        {
            title: "K-Coin 신청",
            url: route("user.coin.request.create"),
        },
        {
            title: "K-Coin 신청내역",
            url: route("user.coin.request.index"),
        },
    ],
    "coin-use": [
        {
            title: "K-Coin 사용",
            url: route("user.coin.use.index"),
        },
    ],
    "coin-manage": [
        {
            title: "K-Coin 관리",
            url: route("user.coin.manage.index"),
        },
    ],
    "coin-history": [
        {
            title: "코인 적립 내역",
            url: route("user.coin.index"),
        },
    ],
    inquiry: [
        {
            title: "문의 게시판",
            url: route("inquiry.index"),
        },
        {
            title: "문의 작성",
            url: route("inquiry.create"),
        },
    ],
    announcement: [
        {
            title: "공지사항",
            url: route("announcement.index"),
        },
        isAdmin && {
            title: "공지사항 등록",
            url: route("admin.announcement.create"),
        },
    ],
    "product-manage": [
        {
            title: "상품 관리",
            url: route("admin.product.index"),
        },
        {
            title: "상품 등록",
            url: route("admin.product.create"),
        },
    ],
    "admin-coin-manage": [
        {
            title: "K-Coin 관리",
            url: route("admin.coin.index"),
        },
        {
            title: "K-Coin 발행",
            url: route("admin.coin.create"),
        },
    ],
    "user-manage": [
        {
            title: "사용자 관리",
            url: route("admin.user.index"),
        },
    ],
    "profile-edit": [
        {
            title: "프로필 관리",
            url: route("user.profile.edit"),
        },
    ],
};
</script>
