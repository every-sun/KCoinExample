<template>
    <form class="flex flex-col my-10" @submit.prevent="onSubmit">
        <textarea
            v-model="form.content"
            class="block w-full resize-none rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-1 focus:-outline-offset-2 focus:outline-primary sm:text-sm/6"
        ></textarea>
        <FillButton class="py-2 px-3 my-2 w-20 text-sm">답변하기</FillButton>
    </form>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import { useForm } from "@inertiajs/vue3";
import { inject } from "vue";

const props = defineProps({
    id: Number,
});
const route = inject("route");
const form = useForm({ content: null });

const onSubmit = () => {
    form.post(route("admin.inquiry.answer.store", props.id));
};
</script>
