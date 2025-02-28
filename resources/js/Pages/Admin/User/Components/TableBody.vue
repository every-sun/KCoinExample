<template>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr
            v-for="(item, i) in data.data"
            :key="item.id"
            class="cursor-pointer hover:bg-gray-50"
            @click="onClick(item.id)"
        >
            <td class="px-2 py-2 whitespace-nowrap">
                {{ (data.current_page - 1) * data.per_page + i + 1 }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ item.employee_number }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ item.name }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ item.ep_id }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">{{ item.contact }}</td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ item.email }}
            </td>
            <td
                class="px-2 py-2 whitespace-nowrap"
                @click="
                    (e) => {
                        e.stopPropagation();
                    }
                "
            >
                <DropDown
                    :items="sortOptions"
                    :value="sortValue(item)"
                    :onSelect="
                        (v) => {
                            onSort(v, item.id);
                        }
                    "
                />
            </td>
        </tr>
    </tbody>
</template>
<script setup>
import DropDown from "@components/DropDown.vue";
import { router } from "@inertiajs/vue3";
import { useConfirmModalStore } from "@store/confilrModal";
import { inject } from "vue";

const props = defineProps({
    data: {
        type: Object,
        required: true,
    },
});

const route = inject("route");

const confirmModalStore = useConfirmModalStore();

const onClick = (id) => {
    router.visit(route("admin.user.show", id));
};

const sortOptions = ["일반", "관리자"];
const sortValue = (v) => (v.role === "admin" ? "관리자" : "일반");

const onSort = (v, id) => {
    confirmModalStore.init({
        text: `해당 사용자의 권한을 [${v}]로 변경하시겠습니까?`,
        func: () => {
            router.put(route("admin.user.update", id), {
                role: v === "관리자" ? "admin" : "user",
            });
        },
        agreeText: "확인",
    });
    confirmModalStore.open();
};
</script>
