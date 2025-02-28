<template>
    <ContentLayout title="마이페이지">
        <form class="flex flex-col w-1/2 gap-4">
            <div class="flex flex-col gap-2">
                <label class="font-semibold">사원번호</label>
                <input class="bg-white p-1 ring-1 ring-gray-400 rounded-md" />
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-semibold">사원명</label>
                <input class="bg-white p-1 ring-1 ring-gray-400 rounded-md" />
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-semibold">EP ID</label>
                <input class="bg-white p-1 ring-1 ring-gray-400 rounded-md" />
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-semibold">이메일</label>
                <input class="bg-white p-1 ring-1 ring-gray-400 rounded-md" />
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-semibold">연락처</label>
                <input class="bg-white p-1 ring-1 ring-gray-400 rounded-md" />
            </div>
            <FillButton class="py-2 mt-10">변경하기</FillButton>
        </form>
    </ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import Layout from "@components/Layout.vue";
import { useCurrentPageStore } from "@store/currentPage";
import { onMounted } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("profile-edit");
});
</script>
