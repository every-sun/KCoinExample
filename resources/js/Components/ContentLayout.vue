<template>
    <div class="w-full flex bg-white min-h-[100vh]">
        <div class="bg-white flex-1 0">
            <div
                class="bg-[#F3F4F8] pt-[150px] px-10 border-b-1 border-gray-300"
            >
                <p
                    class="font-semibold text-2xl mb-4"
                    v-if="
                        pageStore.currentPage &&
                        pageStore.currentTabIdx >= 0 &&
                        tabs[pageStore.currentPage]
                    "
                >
                    {{
                        tabs[pageStore.currentPage][pageStore.currentTabIdx]
                            ?.title
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
            <div class="px-10 py-10"><slot></slot></div>
        </div>
    </div>
    <ConfirmModal />
</template>
<script setup>
import ConfirmModal from "@components/Modal/ConfirmModal.vue";
import { Link } from "@inertiajs/vue3";
import { inject } from "vue";
import { useCurrentPageStore } from "../store/currentPage";

const pageStore = useCurrentPageStore();

const route = inject("route");

const tabs = {
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
        {
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
    ],
};
</script>
