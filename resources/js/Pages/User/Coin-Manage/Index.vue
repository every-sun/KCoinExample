<template>
    <div class="w-full">
        <ContentLayout :childList="contentList" />
    </div>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Content from "./Components/Content.vue";

const contentList = [
    {
        title: "K-Coin 관리",
        url: "/user/k-coin/manage",
        comp: Content,
    },
];
</script>
