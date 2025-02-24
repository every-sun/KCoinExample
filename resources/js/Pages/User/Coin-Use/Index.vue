<template>
    <div class="w-full">
        <ContentLayout :childList="contentList" />
    </div>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import { inject } from "vue";
import Content from "./Components/Content.vue";

const props = defineProps({
    products: {
        type: Object,
        required: true,
    },
});

const route = inject("route");

const contentList = [
    {
        title: "K-Coin 사용",
        url: route("user.coin.use.index"),
        comp: Content,
        data: {
            products: props.products,
        },
    },
];
</script>
