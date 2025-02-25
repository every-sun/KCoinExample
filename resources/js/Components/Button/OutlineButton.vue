<template>
    <button
        :class="[
            'ring-1 ring-button text-button rounded-md cursor-pointer bg-white',
        ]"
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
