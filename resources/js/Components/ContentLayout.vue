<template>
    <Header :toggleHamburger="toggleHamburger"></Header>
    <div class="w-full flex bg-white min-h-[100vh]">
        <div
            :class="['flex flex-col w-[15%] bg-primary pt-[150px] px-6  pb-20']"
        >
            <UserInfo :data="dummyData" />
            <Menus />
        </div>
        <div class="w-[85%] 0">
            <div
                class="bg-[#F3F4F8] pt-[150px] px-10 border-b-1 border-gray-300"
            >
                <p class="font-semibold text-2xl mb-4">
                    {{ current?.title }}
                </p>
                <div class="flex gap-8">
                    <Link
                        v-for="(item, i) in tabs"
                        :href="item.url"
                        :key="item.title"
                        :class="[
                            'border-b-4 cursor-pointer py-2',
                            current?.url === item.url
                                ? 'border-b-secondary text-secondary'
                                : 'border-b-transparent',
                        ]"
                    >
                        {{ item.title }}
                    </Link>
                </div>
            </div>
            <div class="px-4 py-10"><slot></slot></div>
        </div>
    </div>
    <ConfirmModal />
</template>
<script setup>
import ConfirmModal from "@components/Modal/ConfirmModal.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import Header from "./Header.vue";
import Menus from "./Menus.vue";
import UserInfo from "./UserInfo.vue";

const props = defineProps({
    tabs: {
        type: Array,
        required: true,
    },
    current: Object,
});

const isHamburgerOn = ref(false);

const toggleHamburger = (newValue) => {
    isHamburgerOn.value = newValue;
};
const dummyData = [
    {
        label: "누적 코인",
        value: 1000,
    },
    {
        label: "사용 코인",
        value: 400,
    },
    {
        label: "잔여 코인",
        value: 600,
    },
    {
        label: "등수",
        value: 2,
    },
];
</script>
