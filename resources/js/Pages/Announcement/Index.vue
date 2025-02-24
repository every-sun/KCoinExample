<template>
    <div class="w-full">
        <ContentLayout :childList="contentList" />
    </div>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Content from "./Components/Content.vue";

const props = defineProps({
    announcements: {
        type: Object,
        requried: true,
    },
});
const contentList = [
    {
        title: "공지사항",
        url: "/announcement",
        comp: Content,
        data: props.announcements,
    },
];
</script>
