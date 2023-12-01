<template>
    <div
        x-show="popup"
        class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen px-6"
        x-cloak
    >
        <div
            x-show="popup"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-on:click="popup = false"
            class="absolute inset-0 w-full h-full bg-black bg-opacity-40"
        ></div>
        <div
            x-show="popup"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative w-full py-4 bg-white px-6 sm:max-w-md sm:rounded-lg max-h-screen overflow-y-auto"
            v-bind:class="class"
        >
            <div
                v-if="title || close"
                class="flex items-center justify-between pb-2"
            >
                <h3 class="text-dark font-medium text-sm">{{ title }}</h3>
                <ClosePopup class="cursor-pointer" x-on:click="popup = false" />
            </div>
            <slot />
        </div>
    </div>
</template>

<script lang="ts" setup>
import ClosePopup from "@/Components/Icon/Etc/CloseGrey.vue";
defineProps<{
    title?: string;
    close?: boolean;
    class?: any
}>();
</script>
\