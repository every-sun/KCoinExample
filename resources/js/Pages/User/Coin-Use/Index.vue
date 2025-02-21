<template>
    <div class="w-full">
        <ContentLayout :childList="contentList" />
    </div>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Content from "./Components/Content.vue";

const props = defineProps({
    products: {
        type: Object,
        required: true,
    },
});

console.log(props.products);
const contentList = [
    {
        title: "K-Coin 사용",
        url: "/user/k-coin/use",
        comp: Content,
        data: {
            products: props.products,
        },
    },
];
</script>
