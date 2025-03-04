<template>
    <div class="text-white flex flex-col pt-5 gap-1">
        <Link
            :href="item.url"
            :class="[
                'text-white py-4 px-3 text-sm cursor-pointer flex gap-2',
                item.type === store.currentPage && 'bg-secondary rounded-md',
            ]"
            v-for="item in menus"
            :key="item.label"
            @click="toggleHamburger && toggleHamburger(false)"
        >
            <component :is="item.icon" class="w-5"></component>
            {{ item.label }}
        </Link>
    </div>
</template>
<script setup>
import {
    BellIcon,
    CircleStackIcon,
    ComputerDesktopIcon,
    CurrencyDollarIcon,
    QuestionMarkCircleIcon,
} from "@heroicons/vue/24/outline";
import { Link } from "@inertiajs/vue3";
import { useCurrentPageStore } from "@store/currentPage";
import { inject } from "vue";

const props = defineProps({
    toggleHamburger: {
        type: Function,
    },
});

const store = useCurrentPageStore();

const route = inject("route");

const isAdmin = window.localStorage.getItem("role") === "admin";

const menus = [
    {
        label: "K-Coin 사용",
        role: "user",
        url: route("user.coin.use.index"),
        icon: CurrencyDollarIcon,
        type: "coin-use",
    },
    {
        label: "K-Coin 신청",
        role: "user",
        url: route("user.coin.request.create"),
        icon: CurrencyDollarIcon,
        type: "coin-request",
    },
    {
        label: "K-Coin 관리",
        role: "user",
        url: route("user.coin.manage.index"),
        icon: CircleStackIcon,
        type: "coin-manage",
    },
    {
        label: "문의 게시판",
        role: "user",
        url: route("inquiry.index"),
        icon: QuestionMarkCircleIcon,
        type: "inquiry",
    },
    {
        label: "공지사항",
        role: "user",
        url: route("announcement.index"),
        icon: BellIcon,
        type: "announcement",
    },
].concat(
    isAdmin
        ? [
              {
                  label: "상품 관리",
                  role: "admin",
                  url: route("admin.product.index"),
                  icon: ComputerDesktopIcon,
                  type: "product-manage",
              },
              {
                  label: "K-Coin 관리",
                  role: "admin",
                  url: route("admin.coin.index"),
                  icon: CircleStackIcon,
                  type: "admin-coin-manage",
              },
              {
                  label: "사용자 관리",
                  role: "admin",
                  url: route("admin.user.index"),
                  icon: CircleStackIcon,
                  type: "user-manage",
              },
          ]
        : []
);
</script>
