<template>
    <tbody>
        <tr
            class="bg-white border-b border-gray-100 text-sm"
            v-for="(item, i) in data.data"
            :key="item.id"
        >
            <td class="px-2 py-1">
                {{ (data.current_page - 1) * data.per_page + i + 1 }}
            </td>
            <td
                class="px-2 py-1 hover:underline cursor-pointer"
                @click="onItemClick(item.id)"
            >
                {{
                    `[${
                        typeOptions.find((e) => e.value === item.type).label
                    }] ${item.title} `
                }}
            </td>
            <td class="px-2 py-1 whitespace-nowrap">
                {{ timestampToDate(item.created_at) }}
            </td>
            <td class="px-2 py-1">작성자명</td>
            <td class="px-2 py-1">
                {{ item.isAnswer ? "답변완료" : "미답변" }}
            </td>
            <td
                v-if="isAdmin"
                class="px-2 py-1 flex gap-1 whitespace-nowrap items-center"
            >
                <OutlineButton
                    class="px-2 text-sm"
                    @click="
                        () => {
                            onDelete(item.id);
                        }
                    "
                    >삭제</OutlineButton
                >
            </td>
        </tr>
    </tbody>
</template>
<script setup>
import OutlineButton from "@components/Button/OutlineButton.vue";
import { router } from "@inertiajs/vue3";
import { useConfirmModalStore } from "@store/confilrModal";
import { useConverter } from "@utils/useConverter";
import { inject } from "vue";

const props = defineProps({
    data: {
        type: Object,
        required: true,
    },
});

const route = inject("route");

const confirmModalStore = useConfirmModalStore();
const { timestampToDate } = useConverter();

const isAdmin = true;

const typeOptions = [
    { label: "K-Coin문의", value: "A" },
    { label: "상품문의", value: "B" },
    { label: "기타문의", value: "C" },
];

const onDelete = (id) => {
    confirmModalStore.init({
        text: "삭제하시겠습니까?",
        func: () => {
            router.delete(route("inquiry.destroy", id));
        },
        agreeText: "삭제",
    });
    confirmModalStore.open();
};

const onItemClick = (id) => {
    router.visit(route("inquiry.show", id));
};
</script>
