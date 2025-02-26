<template>
    <TransitionRoot as="template" :show="store.isOpen">
        <Dialog class="relative z-10" @close="store.close">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500/75 transition-opacity"
                ></div>
            </TransitionChild>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6"
                        >
                            <div
                                class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block"
                            >
                                <button
                                    type="button"
                                    class="rounded-md bg-white text-gray-400 hover:text-gray-500"
                                    @click="store.close"
                                >
                                    <span class="sr-only">Close</span>
                                    <XMarkIcon
                                        class="size-6"
                                        aria-hidden="true"
                                    />
                                </button>
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ store.message }}
                            </p>
                            <div class="mt-5 flex gap-2 justify-end">
                                <WhiteButton
                                    class="text-sm px-3 py-1.5"
                                    @click="store.close"
                                    >{{ store.cancelBtn }}</WhiteButton
                                >
                                <FillButton
                                    class="text-sm px-3 py-1.5"
                                    @click="
                                        () => {
                                            store.onAgree();
                                            store.close();
                                        }
                                    "
                                    >{{ store.agreeBtn }}</FillButton
                                >
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
<script setup>
import FillButton from "@components/Button/FillButton.vue";
import {
    Dialog,
    DialogPanel,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { XMarkIcon } from "@heroicons/vue/24/outline";
import { useConfirmModalStore } from "@store/confilrModal";
import WhiteButton from "../Button/WhiteButton.vue";

const store = useConfirmModalStore();
</script>
