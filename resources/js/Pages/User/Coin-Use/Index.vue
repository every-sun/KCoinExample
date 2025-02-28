<template>
    <ContentLayout>
        <div class="w-full">
            <div class="flex w-full items-center mb-3">
                <div class="flex gap-2 items-center w-[60%] text-sm">
                    <span>나의 잔여 코인</span>
                    <span class="w-[1.5px] h-[18px] bg-gray-400"></span>
                    <span class="text-secondary font-bold">600 코인</span>
                </div>
            </div>

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

            <div class="grid-cols-5 grid gap-6">
                <div
                    v-for="item in products.data"
                    :key="item.id"
                    class="ring-1 ring-gray-100 shadow shadow-gray-300 rounded-md p-2 cursor-pointer relative overflow-hidden"
                    @click="onDetail(item)"
                >
                    <p class="text-sm font-semibold truncate">
                        {{ item.name }}
                    </p>
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
                    <FillButton
                        @click="
                            (e) => {
                                onClick(item, e);
                            }
                        "
                        :class="'w-full text-sm rounded-none'"
                        >신청</FillButton
                    >
                </div>
            </div>

            <PageController
                :links="products.links"
                :currentPage="products.current_page"
            /></div
    ></ContentLayout>

    <ShowModal v-if="showProduct !== null" :onClose="closeDetail"
        ><div>
            <div
                class="w-full h-[300px] bg-gray-200 flex items-center justify-center"
            >
                IMAGE
            </div>
            <div class="border-1 my-5 border-gray-400">
                <div class="border-b-1 flex border-gray-400">
                    <p
                        class="w-24 border-r-[0.5px] border-gray-400 p-1 text-sm"
                    >
                        상품명
                    </p>
                    <p
                        class="flex-1 border-l-[0.5px] border-gray-400 p-1 text-sm"
                    >
                        {{ showProduct.name }}
                    </p>
                </div>
                <div class="border-b-1 flex border-gray-400">
                    <p
                        class="w-24 border-r-[0.5px] border-gray-400 p-1 text-sm"
                    >
                        코인
                    </p>
                    <p
                        class="flex-1 border-l-[0.5px] border-gray-400 p-1 text-sm"
                    >
                        {{ showProduct.price }}
                    </p>
                </div>
                <div class="flex">
                    <p
                        class="w-24 border-r-[0.5px] border-gray-400 p-1 text-sm"
                    >
                        상품설명
                    </p>
                    <p
                        class="flex-1 border-l-[0.5px] border-gray-400 p-1 text-sm"
                    >
                        {{ showProduct.description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex gap-2 w-full">
            <WhiteButton class="flex-1" @click="closeDetail">취소</WhiteButton>
            <FillButton
                class="flex-1"
                @click="
                    (e) => {
                        onClick(showProduct, e);
                    }
                "
                >사용</FillButton
            >
        </div>
    </ShowModal>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import OutlineButton from "@components/Button/OutlineButton.vue";
import WhiteButton from "@components/Button/WhiteButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import DropDown from "@components/DropDown.vue";
import FilterInput from "@components/FilterInput.vue";
import FilterNumberInput from "@components/FilterNumberInput.vue";
import Layout from "@components/Layout.vue";
import ShowModal from "@components/Modal/ShowModal.vue";
import PageController from "@components/PageController.vue";
import { router } from "@inertiajs/vue3";
import { useConfirmModalStore } from "@store/confilrModal";
import { useCurrentPageStore } from "@store/currentPage";
import { inject, onMounted, ref } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("coin-use");
    pageStore.setTabIdx(0);
});

const route = inject("route");

const props = defineProps({
    products: {
        type: Object,
        required: true,
    },
    item: {
        type: Object,
    },
});

const confirmModalStore = useConfirmModalStore();

const showProduct = ref(null);

const sortOptions = ["최신순", "낮은 가격순", "높은 가격순"];
const sortValue = ref(sortOptions[0]);

const onSort = (v) => {
    sortValue.value = v;
};

const onClick = (v, e) => {
    e.stopPropagation();
    confirmModalStore.init({
        text: `${v.price} 코인을 사용하시겠습니까?`,
        func: () => {
            router.post(
                route("user.coin.use.store"),
                {
                    product_id: v.id,
                    used_coins: v.price,
                },
                {
                    onSuccess: () => {
                        confirmModalStore.init({
                            text: "사용신청하였습니다.",
                            func: () => {},
                        });
                        confirmModalStore.open();
                    },
                }
            );
        },
    });
    confirmModalStore.open();
};

const onDetail = (item) => {
    showProduct.value = item;
    console.log(showProduct.value);
};

const closeDetail = () => {
    showProduct.value = null;
};
</script>
