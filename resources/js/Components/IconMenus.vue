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

const menus = [
    {
        url: route("user.coin.use.index"),
        icon: CurrencyDollarIcon,
    },
    {
        url: route("user.coin.manage.index"),
        icon: CircleStackIcon,
    },
    {
        url: route("inquiry.index"),
        icon: QuestionMarkCircleIcon,
    },
    {
        url: route("announcement.index"),
        icon: BellIcon,
    },
    {
        url: route("admin.product.index"),
        icon: ComputerDesktopIcon,
    },
    {
        url: route("admin.coin.index"),
        icon: CircleStackIcon,
    },
];
</script>
