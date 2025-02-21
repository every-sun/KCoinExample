<template>
    <div class="text-white flex flex-col pt-5 gap-1">
        <Link
            :href="item.url"
            :class="[
                'text-white py-4 px-3 text-sm cursor-pointer',
                url.includes(item.url) && 'bg-secondary rounded-md',
            ]"
            v-for="item in menus"
            :key="item.label"
        >
            {{ item.label }}
        </Link>
    </div>
</template>
<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { menus } from "../utils/data";
const { url } = usePage();
</script>
