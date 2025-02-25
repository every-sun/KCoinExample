<template>
    <ContentLayout :tabs="tabs" :current="tabs[0]">
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
import { ChevronLeftIcon } from "@heroicons/vue/24/outline";
import { inject } from "vue";

const route = inject("route");

const props = defineProps({
    announcement: {
        type: Object,
        requried: true,
    },
});

const onPrev = () => {
    window.history.back();
};

const tabs = [
    {
        title: "공지사항",
        url: route("announcement.index"),
    },
    {
        title: "공지사항 등록",
        url: route("admin.announcement.create"),
    },
];
</script>
