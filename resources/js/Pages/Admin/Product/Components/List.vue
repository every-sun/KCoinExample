<template>
    <div class="w-full">
        <div
            class="shadow-sm ring-1 ring-inset ring-gray-300 p-2 rounded-md flex flex-col gap-2"
        >
            <div class="flex gap-2 items-center">
                <label for="name" class="text-xs w-28">상품명</label>
                <FilterInput />
            </div>
            <div class="flex gap-2 items-center">
                <p class="text-xs w-28">코인</p>
                <div class="flex-1 flex items-center justify-between">
                    <div class="flex gap-2 items-center">
                        <FilterNumberInput />
                        <p>~</p>
                        <FilterNumberInput />
                    </div>
                    <FillButton title="검색" class="text-xs px-8 py-1" />
                </div>
            </div>
        </div>

        <div class="w-full flex justify-between my-3">
            <span class="text-secondary font-bold text-sm"
                >총 {{ data.total }}개</span
            >
            <DropDown
                :items="sortOptions"
                :value="sortValue"
                :onSelect="onSort"
            />
        </div>

        <div class="grid-cols-5 grid gap-6 mt-3">
            <div
                v-for="item in data.data"
                :key="item.id"
                class="ring-1 ring-gray-100 shadow shadow-gray-300 rounded-md p-2 cursor-pointer relative overflow-hidden"
            >
                <p class="text-sm font-semibold truncate">
                    {{ item.name }}
                </p>
                <div class="bg-gray-200 h-24 flex items-center justify-center">
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
                v-for="(item, i) in data.links"
                :href="item.url || '#'"
                :class="[
                    ' px-1 rounded-md hover:bg-gray-100',
                    data.current_page === i
                        ? `ring-2 ring-secondary text-button`
                        : 'ring-1 ring-gray-500',
                ]"
            >
                <p v-if="i === 0">이전</p>
                <p v-else-if="i === data.links.length - 1">다음</p>
                <p v-else>
                    {{ item.label }}
                </p>
            </Link>
        </div>
    </div>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import DropDown from "@components/DropDown.vue";
import FilterInput from "@components/FilterInput.vue";
import FilterNumberInput from "@components/FilterNumberInput.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    data: {
        type: Object,
        required: false,
    },
});

const sortOptions = ["최신순", "낮은 가격순", "높은 가격순"];
const sortValue = ref(sortOptions[0]);
const onSort = (v) => {
    sortValue.value = v;
};
</script>
