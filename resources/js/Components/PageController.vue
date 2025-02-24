<template>
    <div class="flex gap-3 mt-10 justify-center">
        <Link
            v-for="(item, i) in links"
            :href="item.url || '#'"
            :key="item.i"
            :preserve-scroll="isScrollPreserve"
            :class="[
                ' px-1 rounded-md hover:bg-gray-100',
                currentPage === i
                    ? `ring-2 ring-secondary text-button`
                    : 'ring-1 ring-gray-500',
            ]"
        >
            <p v-if="i === 0">이전</p>
            <p v-else-if="i === links.length - 1">다음</p>
            <p v-else>
                {{ item.label }}
            </p>
        </Link>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    currentPage: Number,
    links: Array,
    isScrollPreserve: {
        type: Boolean,
        default: false,
    },
});
</script>
