<template>
    <div>
        <Header :toggleHamburger="toggleHamburger"></Header>
        <div
            :class="[
                'fixed top-0 left-0 transition-all duration-[0.4s] w-full h-[100vh]',
                isHamburgerOn
                    ? 'pointer-events-auto bg-gray-500/75'
                    : 'pointer-events-none bg-transparent',
            ]"
            @click="toggleHamburger(false)"
        ></div>
        <div
            :class="[
                'fixed top-0 h-[100vh] bg-primary w-52 px-6 transition-all duration-[0.4s] z-10',
                isHamburgerOn
                    ? 'opacity-[100%] left-0'
                    : 'left-[-100%] opacity-[0%]',
            ]"
        >
            <div class="w-full h-[80px] flex items-center">
                <button
                    class="text-white cursor-pointer text-2xl"
                    @click="toggleHamburger(false)"
                >
                    X
                </button>
            </div>
            <UserInfo :data="dummyData" />
            <Menus />
        </div>
        <slot></slot>
    </div>
</template>
<script setup>
import { ref } from "vue";
import Header from "./Header.vue";
import Menus from "./Menus.vue";
import UserInfo from "./UserInfo.vue";

const isHamburgerOn = ref(false);

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
const toggleHamburger = (newValue) => {
    isHamburgerOn.value = newValue;
};
</script>
