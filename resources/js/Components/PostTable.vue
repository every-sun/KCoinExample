<template>
    <div class="w-full overflow-x-scroll">
        <table class="w-full divide-y">
            <thead class="bg-white border-b-2">
                <tr>
                    <th
                        v-for="item in headers"
                        :key="item"
                        scope="col"
                        class="py-3 px-2 whitespace-nowrap text-left text-sm font-semibold text-gray-900"
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
