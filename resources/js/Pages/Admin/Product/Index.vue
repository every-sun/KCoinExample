<template>
    <ContentLayout>
        <div class="w-full">
            <div
                class="shadow-sm ring-1 ring-inset ring-gray-300 p-2 rounded-md flex flex-col gap-2"
            >
                <div class="flex gap-2 items-center">
                    <label class="text-xs w-28">상품명</label>
                    <FilterInput placeholder="검색어를 입력하세요" />
                </div>
                <div class="flex gap-2 items-center">
                    <p class="text-xs w-28">코인</p>
                    <div class="flex-1 flex items-center justify-between">
                        <div class="flex gap-2 items-center">
                            <FilterNumberInput />
                            <p>~</p>
                            <FilterNumberInput />
                        </div>
                        <div>
                            <OutlineButton class="text-xs px-8 py-1 mr-2"
                                >초기화</OutlineButton
                            >
                            <FillButton class="text-xs px-8 py-1"
                                >검색</FillButton
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex justify-between my-3">
                <span class="text-secondary font-bold text-sm"
                    >총 {{ products.total }}개</span
                >
                <DropDown
                    :items="sortOptions"
                    :value="sortValue"
                    :onSelect="onSort"
                />
            </div>

            <div class="grid-cols-5 grid gap-6 mt-3">
                <!-- <div
                    v-for="item in products.data"
                    :key="item.id"
                    class="ring-1 ring-gray-100 shadow shadow-gray-300 rounded-md p-2 cursor-pointer relative overflow-hidden"
                    @click="onItemClick(item)"
                > -->
                <div
                    v-for="item in products.data"
                    :key="item.id"
                    class="rounded-md p-2 cursor-pointer relative overflow-hidden"
                    @click="onItemClick(item)"
                >
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-semibold truncate">
                            {{ item.name }}
                        </p>
                        <button
                            type="button"
                            class="bg-white text-gray-400 hover:text-gray-500 cursor-pointer"
                            @click="(e) => onItemDelete(e, item)"
                        >
                            <XMarkIcon class="size-6" />
                        </button>
                    </div>
                    <div
                        class="bg-gray-200 h-24 flex items-center justify-center"
                    >
                        IMAGE
                    </div>
                    <p class="text-xs truncate">
                        {{ item.description }}
                    </p>
                    <p class="text-xs truncate font-bold mt-2">
                        {{ item.price }} 코인
                    </p>
                </div>
            </div>

            <div class="flex gap-3 mt-10 justify-center">
                <Link
                    v-for="(item, i) in products.links"
                    :href="item.url || '#'"
                    :class="[
                        ' px-1 rounded-md hover:bg-gray-100',
                        products.current_page === i
                            ? `ring-2 ring-secondary text-button`
                            : 'ring-1 ring-gray-500',
                    ]"
                >
                    <p v-if="i === 0">이전</p>
                    <p v-else-if="i === products.links.length - 1">다음</p>
                    <p v-else>
                        {{ item.label }}
                    </p>
                </Link>
            </div>
        </div>
    </ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import OutlineButton from "@components/Button/OutlineButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import DropDown from "@components/DropDown.vue";
import FilterInput from "@components/FilterInput.vue";
import FilterNumberInput from "@components/FilterNumberInput.vue";
import Layout from "@components/Layout.vue";
import { XMarkIcon } from "@heroicons/vue/24/outline";
import { Link, router } from "@inertiajs/vue3";
import { useConfirmModalStore } from "@store/confilrModal";
import { useCurrentPageStore } from "@store/currentPage";
import { inject, onMounted, ref } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("product-manage");
    pageStore.setTabIdx(0);
});

const route = inject("route");

const props = defineProps({
    products: {
        type: Object,
        required: false,
    },
});

const confirmModalStore = useConfirmModalStore();

const sortOptions = ["최신순", "낮은 가격순", "높은 가격순"];
const sortValue = ref(sortOptions[0]);

const onSort = (v) => {
    sortValue.value = v;
};

const onItemDelete = (e, item) => {
    e.stopPropagation();
    confirmModalStore.init({
        text: `[${item.name}] 상품을 삭제하시겠습니까?`,
        func: () => {
            router.delete(route("admin.product.destroy", item.id));
        },
    });
    confirmModalStore.open();
};

const onItemClick = (item) => {
    router.visit(route("admin.product.edit", item.id));
};
</script>
