<template>
    <tbody>
        <tr
            v-for="(item, i) in data.data"
            :key="item.id"
            class="bg-white border-b border-gray-100 text-sm"
        >
            <td class="px-2 py-2">
                {{ (data.current_page - 1) * data.per_page + i + 1 }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ item.user.name }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ item.user.employee_number }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">{{ item.user.ep_id }}</td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ timestampToDate(item.created_at).split(" ")[0] }}
            </td>
            <td class="px-2 py-1 whitespace-nowrap">
                {{ item.product.name }}
            </td>
            <td class="px-2 py-2">{{ item.used_coins }}</td>
            <td class="px-2 py-2 font-semibold">{{ status(item.status) }}</td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{
                    item.completed_date
                        ? timestampToDate(item.completed_date).split(" ")[0]
                        : "-"
                }}
            </td>
            <td class="px-2 py-2">
                {{
                    item.cancel_request_date
                        ? timestampToDate(item.cancel_request_date).split(
                              " "
                          )[0]
                        : "-"
                }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                <WhiteButton
                    v-if="item.status === 'W'"
                    class="px-2 py-1 text-sm"
                    @click="onAgreeComplete(item.id)"
                    >지급</WhiteButton
                >
                <WhiteButton
                    v-if="item.status === 'CW'"
                    class="px-2 py-1 text-sm"
                    @click="onAgreeCancel(item.id)"
                    >승인</WhiteButton
                >
            </td>
        </tr>
    </tbody>
</template>
<script setup>
import WhiteButton from "@components/Button/WhiteButton.vue";
import { router } from "@inertiajs/vue3";
import { useConverter } from "@utils/useConverter";
import { inject } from "vue";

const props = defineProps({
    data: {
        type: Object,
    },
});

const route = inject("route");

const { timestampToDate } = useConverter();

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

const onAgreeCancel = (id) => {
    router.put(route("user.coin.use.update", id), {
        status: "CC",
        cancel_complete_date: new Date(),
    });
};
const onAgreeComplete = (id) => {
    router.put(route("user.coin.use.update", id), {
        status: "E",
        completed_date: new Date(),
    });
};
</script>
