<template>
    <div class="w-full">
        <ContentLayout :childList="contentList" />
    </div>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import { inject } from "vue";
import Create from "./Components/Create.vue";
import List from "./Components/List.vue";

const props = defineProps({
    products: {
        type: Object,
        required: false,
    },
});

const route = inject("route");

const contentList = [
    {
        title: "상품 관리",
        url: route("admin.product.manage.index"),
        comp: List,
        data: props.products,
    },
    {
        title: "상품 등록",
        url: route("admin.product.create"),
        comp: Create,
    },
];
</script>
