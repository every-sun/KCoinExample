<template>
    <ContentLayout>
        <div>
            <div class="flex gap-3 cursor-pointer" @click="onPrev">
                <ChevronLeftIcon class="w-6" />
                <h2 class="text-lg font-semibold">{{ announcement.title }}</h2>
            </div>
            <hr class="border-t-1 border-gray-400 my-4" />
            <p>
                {{ announcement.content }}
            </p>
        </div>
    </ContentLayout>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Layout from "@components/Layout.vue";
import { ChevronLeftIcon } from "@heroicons/vue/24/outline";
import { useCurrentPageStore } from "@store/currentPage";
import { onMounted } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("announcement");
    pageStore.setTabIdx(0);
});

const props = defineProps({
    announcement: {
        type: Object,
        requried: true,
    },
});

const onPrev = () => {
    window.history.back();
};
</script>
