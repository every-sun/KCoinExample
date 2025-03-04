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
                {{
                    item.type === "P"
                        ? timestampToDate(item.created_at).split(" ")[0]
                        : "-"
                }}
            </td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{
                    item.type === "M"
                        ? timestampToDate(item.created_at).split(" ")[0]
                        : "-"
                }}
            </td>
            <td class="px-2 py-2">{{ item.amount }}</td>
            <td class="px-2 py-2 whitespace-nowrap">
                {{ item.description }}
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
</script>
