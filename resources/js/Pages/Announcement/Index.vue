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
        title: "공지사항",
        url: "/announcement",
        comp: Content,
    },
];
</script>
