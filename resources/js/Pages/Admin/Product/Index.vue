<template>
    <div class="w-full">
        <ContentLayout :childList="contentList" />
    </div>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Create from "./Components/Create.vue";
import List from "./Components/List.vue";

const props = defineProps({
    data: {
        type: Object,
        required: false,
    },
});

const contentList = [
    {
        title: "상품 관리",
        url: "/admin/product/manage",
        comp: List,
        data: props.data,
    },
    {
        title: "상품 등록",
        url: "/admin/product/create",
        comp: Create,
    },
];
</script>
