<template>
    <div class="w-full">
        <ContentLayout :childList="contentList" />
    </div>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import { inject } from "vue";
import Content from "./Components/Content.vue";

const route = inject("route");
const contentList = [
    {
        title: "K-Coin 관리",
        url: route("user.coin.manage.index"),
        comp: Content,
    },
];
</script>
