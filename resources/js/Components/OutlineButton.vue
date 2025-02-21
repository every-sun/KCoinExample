<template>
    <button
        :class="[
            'ring-1 ring-button text-button rounded-md cursor-pointer bg-white',
        ]"
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
