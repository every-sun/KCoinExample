<template>
    <tbody>
        <tr
            v-for="(item, i) in data.data"
            :key="item.id"
            class="bg-white border-b border-gray-100 text-sm"
        >
            <td class="px-2 py-1">
                {{ (data.current_page - 1) * data.per_page + i + 1 }}
            </td>
            <td class="px-2 py-1 whitespace-nowrap">
                {{ timestampToDate(item.created_at).split(" ")[0] }}
            </td>
            <td class="px-2 py-1">{{ item.product.name }}</td>
            <td class="px-2 py-1">{{ item.used_coins }}</td>
            <td class="px-2 py-1">{{ status(item.status) }}</td>
            <td class="px-2 py-1 whitespace-nowrap">
                {{
                    item.completed_date
                        ? timestampToDate(item.completed_date).split(" ")[0]
                        : "-"
                }}
            </td>
            <td class="px-2 py-1">
                {{
                    item.cancel_request_date
                        ? timestampToDate(item.cancel_request_date).split(
                              " "
                          )[0]
                        : "-"
                }}
            </td>
            <td class="px-2 py-1">
                <WhiteButton
                    v-if="isCancelable(item)"
                    class="px-2 text-sm"
                    @click="onCancelRequest(item)"
                    >신청취소</WhiteButton
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
    },
});

const route = inject("route");

const { timestampToDate } = useConverter();

const confirmModalStore = useConfirmModalStore();

const isCancelable = (item) => {
    return item.status === "W";
    // TODO 며칠 이내 기준 가능
};

const onCancelRequest = (v) => {
    confirmModalStore.init({
        text: "사용 신청을 취소하시겠습니까?",
        func: () => {
            router.put(route("user.coin.use.update", v.id), {
                status: "CW",
                cancel_request_date: new Date(),
            });
        },
    });
    confirmModalStore.open();
};

const status = (status) => {
    switch (status) {
        case "E":
            return "지급완료";
        case "W":
            return "신청중";
        case "CW":
            return "취소신청중";
        case "CC":
            return "취소완료";
        default:
            return "";
    }
};
</script>
