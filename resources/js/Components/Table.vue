<template>
    <div class="overflow-x-scroll w-full">
        <table class="w-full divide-y divide-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th
                        v-for="item in headers"
                        :key="item"
                        scope="col"
                        class="py-2 px-2 whitespace-nowrap text-left text-sm font-semibold text-gray-900"
                    >
                        {{ item }}
                    </th>
                </tr>
            </thead>
            <slot></slot>
        </table>
    </div>
</template>
<script setup>
const props = defineProps({
    headers: Array,
});
</script>
