<template>
    <button :class="['bg-button text-white rounded-md cursor-pointer']">
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
