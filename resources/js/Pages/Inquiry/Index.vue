<template>
    <ContentLayout :tabs="tabs" :current="tabs[0]"
        ><div>무늬</div></ContentLayout
    >
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import { inject } from "vue";

const route = inject("route");

const tabs = [
    {
        title: "문의 게시판",
        url: route("inquiry.index"),
    },
];
</script>
