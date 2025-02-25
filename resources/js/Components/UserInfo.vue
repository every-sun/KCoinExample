<template>
    <div class="border-b-2 border-gray-400 pb-3">
        <button class="cursor-pointer text-white flex items-center gap-5 mb-8">
            <p>사용자님</p>
            <p>></p>
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
                title="상세 코인 적립 내역 확인하기 >"
                class="text-xs py-1"
            />
        </div>
    </div>
</template>
<script setup>
import WhiteButton from "@components/Button/WhiteButton.vue";
const props = defineProps({
    data: {
        type: Object,
    },
});
</script>
