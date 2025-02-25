<template>
    <ContentLayout :tabs="tabs" :current="tabs[0]"
        ><div>K코인 관리</div></ContentLayout
    >
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import { inject } from "vue";

const route = inject("route");

const tabs = [
    {
        title: "K-Coin 관리",
        url: route("admin.coin.index"),
    },
];
</script>
