<template>
    <div class="border-b-2 border-gray-400 pb-3">
        <button
            @click="moveProfileEditPage"
            class="cursor-pointer text-white flex items-center gap-5 mb-8 w-full justify-between"
        >
            <p>사용자님</p>
            <ChevronRightIcon class="w-4" />
        </button>
        <div class="flex flex-col gap-3">
            <p
                class="flex justify-between items-center text-sm"
                v-for="item in data"
                :key="item.label"
            >
                <span class="text-[#9EA9C3]">
                    {{ item.label }}
                </span>
                <span class="text-white">
                    {{ item.value }}
                </span>
            </p>
            <WhiteButton
                class="py-2 px-2 text-sm flex justify-between items-center"
                @click="moveCoinPage"
            >
                <p>코인 적립 내역</p>
                <ChevronRightIcon class="w-3" />
            </WhiteButton>
        </div>
    </div>
</template>
<script setup>
import WhiteButton from "@components/Button/WhiteButton.vue";
import { ChevronRightIcon } from "@heroicons/vue/24/outline";
import { router } from "@inertiajs/vue3";
import { inject } from "vue";

const props = defineProps({
    data: {
        type: Object,
    },
});

const route = inject("route");

const moveCoinPage = () => {
    router.visit(route("user.coin.index"));
};

const moveProfileEditPage = () => {
    router.visit(route("user.profile.edit"));
};
</script>
