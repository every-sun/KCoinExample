<template>
    <div class="w-full">
        <Header :toggleHamburger="toggleHamburger"></Header>
        <div
            v-if="isDefault"
            :class="[
                'fixed top-0 left-0 transition-all duration-[0.4s] w-full h-[100vh]',
                isHomeHamburgerOn
                    ? 'pointer-events-auto bg-gray-500/75'
                    : 'pointer-events-none bg-transparent',
            ]"
            @click="toggleHamburger"
        ></div>
        <div
            v-if="isDefault"
            :class="[
                'fixed top-0 h-[100vh] bg-primary w-52 px-6 transition-all duration-[0.4s] z-10',
                isHomeHamburgerOn
                    ? 'opacity-[100%] left-0'
                    : 'left-[-100%] opacity-[0%]',
            ]"
        >
            <div class="w-full h-[80px] flex items-center">
                <button
                    class="text-white cursor-pointer text-2xl"
                    @click="toggleHamburger"
                >
                    X
                </button>
            </div>
            <UserInfo :data="dummyData" />
            <Menus :toggleHamburger="toggleHamburger" />
        </div>
        <slot v-if="isDefault"></slot>

        <div v-else class="w-full flex bg-white min-h-[100vh]">
            <div
                v-if="isHamburgerOn"
                :class="[
                    'flex flex-col flex-1 bg-primary pt-[150px] px-6 pb-20',
                ]"
            >
                <UserInfo :data="dummyData" />
                <Menus />
            </div>
            <div
                v-else
                :class="['flex flex-col bg-primary pt-[100px] px-2 pb-20']"
            >
                <IconMenus />
            </div>
            <div :class="isHamburgerOn ? 'w-[85%]' : 'w-full'">
                <slot></slot>
            </div>
        </div>
    </div>
    <ConfirmModal />
</template>
<script setup>
import ConfirmModal from "@components/Modal/ConfirmModal.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { computed, ref } from "vue";
import Header from "./Header.vue";
import IconMenus from "./IconMenus.vue";
import Menus from "./Menus.vue";
import UserInfo from "./UserInfo.vue";

const pageStore = useCurrentPageStore();

const isHomeHamburgerOn = ref(false);
const isHamburgerOn = ref(true);

const isDefault = computed(
    () => pageStore.currentPage === "home" || pageStore.currentPage === "login"
);

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

const toggleHamburger = () => {
    if (isDefault.value) {
        isHomeHamburgerOn.value = !isHomeHamburgerOn.value;
    } else {
        isHamburgerOn.value = !isHamburgerOn.value;
    }
};
</script>
