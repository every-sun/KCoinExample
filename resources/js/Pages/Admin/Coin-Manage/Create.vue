<template>
    <ContentLayout>
        <div class="w-full flex gap-4 items-center">
            <div class="w-[50%]">
                <div class="flex justify-between">
                    <p class="mt-2 text-sm text-gray-500">
                        코인을 발행할 사용자를 선택해주세요.
                    </p>
                    <div class="flex gap-2 mb-4">
                        <DropDown
                            :items="sortOptions"
                            :value="sortValue"
                            :onSelect="onSort"
                            py="py-3"
                        />
                        <div
                            class="bg-white ring-gray-300 ring-1 rounded-sm pl-2 text-xs py-1 flex items-center"
                        >
                            <input class="focus:outline-none" />
                            <button class="cursor-pointer px-2">
                                <MagnifyingGlassIcon class="w-5" />
                            </button>
                        </div>
                    </div>
                </div>
                <table class="w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="relative sm:w-12 sm:px-6">
                                <div
                                    class="group absolute left-4 top-1/2 -mt-2 grid size-4 grid-cols-1"
                                >
                                    <input
                                        type="checkbox"
                                        class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-secondary checked:bg-secondary indeterminate:border-secondary indeterminate:bg-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                        :checked="
                                            indeterminate ||
                                            selectedUsers.length ===
                                                users.data.length
                                        "
                                        :indeterminate="indeterminate"
                                        @change="
                                            selectedUsers = $event.target
                                                .checked
                                                ? users.data.map((e) => e.id)
                                                : []
                                        "
                                    />
                                    <svg
                                        class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                        viewBox="0 0 14 14"
                                        fill="none"
                                    >
                                        <path
                                            class="opacity-0 group-has-[:checked]:opacity-100"
                                            d="M3 8L6 11L11 3.5"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                            d="M3 7H11"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                            </th>
                            <th
                                scope="col"
                                class="py-3 text-left text-sm font-semibold text-gray-900"
                                v-for="item in headers"
                                :key="item"
                            >
                                {{ item }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr
                            v-for="(item, i) in users.data"
                            :key="item.id"
                            :class="[
                                selectedUsers.includes(item.id) && 'bg-gray-50',
                            ]"
                        >
                            <td class="relative">
                                <div
                                    class="group absolute left-4 top-1/2 -mt-2 grid size-4 grid-cols-1"
                                >
                                    <input
                                        type="checkbox"
                                        class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-secondary checked:bg-secondary indeterminate:border-secondary indeterminate:bg-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                        :value="item.id"
                                        v-model="selectedUsers"
                                    />
                                    <svg
                                        class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                        viewBox="0 0 14 14"
                                        fill="none"
                                    >
                                        <path
                                            class="opacity-0 group-has-[:checked]:opacity-100"
                                            d="M3 8L6 11L11 3.5"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                            d="M3 7H11"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                            </td>
                            <td class="px-1 py-3 text-sm text-gray-500">
                                {{
                                    (users.current_page - 1) * users.per_page +
                                    i +
                                    1
                                }}
                            </td>
                            <td
                                class="whitespace-nowrap px-1 py-3 text-sm text-gray-500"
                            >
                                {{ item.employee_number }}
                            </td>
                            <td
                                :class="[
                                    ' py-4 pr-3 text-sm font-medium',
                                    selectedUsers.includes(item.id)
                                        ? 'text-secondary'
                                        : 'text-gray-900',
                                ]"
                            >
                                {{ item.name }}
                            </td>
                            <td
                                class="whitespace-nowrap px-1 py-3 text-sm text-gray-500"
                            >
                                {{ item.ep_id }}
                            </td>

                            <td
                                class="whitespace-nowrap px-1 py-3 text-sm text-gray-500"
                            >
                                {{ item.role === "admin" ? "관리자" : "일반" }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <PageController
                    :links="users.links"
                    :currentPage="users.current_page"
                    :isScrollPreserve="true"
                />
            </div>
            <form class="flex-1 w-[30%]" @submit.prevent="onClick">
                <label class="text-xs"> 발행코인 </label>
                <input
                    type="number"
                    min="0"
                    class="my-1 focus:outline-none flex-1 bg-white ring-gray-300 ring-1 rounded-sm pl-2 text-xs py-2 flex items-center justify-between w-full"
                    v-model="form.amount"
                />
                <label class="text-xs"> 설명 </label>
                <input
                    class="my-1 focus:outline-none flex-1 bg-white ring-gray-300 ring-1 rounded-sm pl-2 text-xs py-2 flex items-center justify-between w-full"
                    v-model="form.description"
                />
                <FillButton class="px-2 py-1 w-full mt-10">발행하기</FillButton>
            </form>
        </div>
    </ContentLayout>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import ContentLayout from "@components/ContentLayout.vue";
import DropDown from "@components/DropDown.vue";
import Layout from "@components/Layout.vue";
import PageController from "@components/PageController.vue";
import { MagnifyingGlassIcon } from "@heroicons/vue/20/solid";
import { useForm } from "@inertiajs/vue3";
import { useCurrentPageStore } from "@store/currentPage";
import { computed, inject, onMounted, ref } from "vue";

defineOptions({
    layout: Layout,
});

onMounted(() => {
    const pageStore = useCurrentPageStore();
    pageStore.setPage("admin-coin-manage");
    pageStore.setTabIdx(1);
});

const props = defineProps({
    users: {
        type: Object,
    },
});

const sortOptions = ["EP ID", "사원번호", "사원명", "이메일"];
const sortValue = ref(sortOptions[0]);

const route = inject("route");

const selectedUsers = ref([]);
const indeterminate = computed(
    () =>
        selectedUsers.value.length > 0 &&
        selectedUsers.value.length < props.users.data.length
);

const headers = ["No", "사원번호", "사원명", "EP ID", "권한"];

const form = useForm({
    user_ids: [],
    amount: 0,
    description: "",
    type: "P",
});

const onSort = (v) => {
    sortValue.value = v;
};

const onClick = () => {
    form.user_ids = selectedUsers.value;
    form.post(route("admin.coin.store"));
};
</script>
