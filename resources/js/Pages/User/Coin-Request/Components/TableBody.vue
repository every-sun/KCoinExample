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
                {{ timestampToDate(item.created_at).split(" ")[0] }}
            </td>
            <td class="px-2 py-2">{{ item.title }}</td>
            <td class="px-2 py-2 font-semibold">{{ status(item.status) }}</td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{
                    item.completed_date
                        ? timestampToDate(item.approved_date).split(" ")[0]
                        : "-"
                }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{
                    item.completed_date
                        ? timestampToDate(item.denied_date).split(" ")[0]
                        : "-"
                }}
            </td>
        </tr>
    </tbody>
</template>
<script setup>
import { useConverter } from "@utils/useConverter";

const props = defineProps({
    data: {
        type: Object,
    },
});

const { timestampToDate } = useConverter();

const status = (status) => {
    switch (status) {
        case "A":
            return "승인";
        case "W":
            return "신청중";
        case "D":
            return "거부";
        default:
            return "";
    }
};
</script>
