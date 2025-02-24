<template>
    <div>
        <div class="flex gap-3 cursor-pointer" @click="onPrev">
            <ChevronLeftIcon class="w-6" />
            <h2 class="text-lg font-semibold">{{ data.title }}</h2>
        </div>
        <hr class="border-t-1 border-gray-400 my-4" />
        <p>
            {{ data.content }}
        </p>
    </div>
</template>
<script setup>
import { ChevronLeftIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    data: {
        type: Object,
        requried: true,
    },
});

const onPrev = () => {
    window.history.back();
};
</script>
