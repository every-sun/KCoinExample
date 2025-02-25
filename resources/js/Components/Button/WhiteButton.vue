<template>
    <button
        class="cursor-pointer rounded-md bg-white text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
    >
        {{ title }}
    </button>
</template>
<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true,
    },
});
</script>
