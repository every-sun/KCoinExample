<template>
    <div class="w-full flex gap-4 justify-center items-center">
        <label for="name">{{ label }}</label>
        <input
            class="flex-1 bg-white ring-gray-500 ring-1 rounded-md py-1 px-2"
            id="name"
        />
        <FillButton title="검색" :class="'px-4 py-1'" />
    </div>
</template>
<script setup>
import FillButton from "@components/FillButton.vue";
const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    onSearch: {
        type: Function,
        required: true,
    },
});
</script>
