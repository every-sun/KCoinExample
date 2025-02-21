<template>
    <button
        :class="['bg-button text-white rounded-md cursor-pointer']"
        @click="onClick"
    >
        {{ title }}
    </button>
</template>
<script setup>
const props = defineProps({
    onClick: {
        type: Function,
        required: false,
    },
    title: {
        type: String,
        required: true,
    },
});
</script>
