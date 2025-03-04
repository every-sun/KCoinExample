<template>
    <tbody>
        <tr
            class="bg-white border-b border-gray-100 text-sm"
            v-for="(item, i) in data.data"
            :key="item.id"
        >
            <td class="px-2 py-2">
                {{ (data.current_page - 1) * data.per_page + i + 1 }}
            </td>
            <td
                class="px-2 py-2 hover:underline cursor-pointer"
                @click="onItemClick(item.id)"
            >
                {{ item.title }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ timestampToDate(item.created_at) }}
            </td>
            <td class="px-2 py-2">관리자</td>
            <td
                v-if="isAdmin"
                class="px-2 py-2 whitespace-nowrap flex gap-1 items-center justify-center"
            >
                <WhiteButton
                    class="px-2 py-1 text-sm"
                    @click="
                        () => {
                            onDelete(item.id);
                        }
                    "
                    >삭제</WhiteButton
                >
                <WhiteButton class="px-2 py-1 text-sm" @click="onEdit(item.id)"
                    >수정</WhiteButton
                >
            </td>
        </tr>
    </tbody>
</template>
<script setup>
import WhiteButton from "@components/Button/WhiteButton.vue";
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

const isAdmin = window.localStorage.getItem("role") === "admin";

const onDelete = (id) => {
    confirmModalStore.init({
        text: "삭제하시겠습니까?",
        func: () => {
            router.delete(route("admin.announcement.destroy", id), {
                onSuccess: () => {
                    router.visit(route("announcement.index"));
                },
            });
        },
        agreeText: "삭제",
    });
    confirmModalStore.open();
};

const onItemClick = (id) => {
    router.visit(route("announcement.show", id));
};

const onEdit = (id) => {
    router.visit(route("admin.announcement.edit", id));
};
</script>
