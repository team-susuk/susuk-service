<template>
    <div x-data="{popup: false}">
        <a :id="id" x-on:click="popup=true"></a>
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
                x-transition:leave="ease-in duration-10"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                x-on:click="popup = false"
                class="absolute inset-0 w-full h-full bg-black bg-opacity-40"
                @click="confirmAction"
            ></div>
            <div
                x-show="popup"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full py-4 px-6 flex-center flex-col gap-2"
            >
                <CloseWhite class="cursor-pointer" x-on:click="popup=false" @click="confirmAction" />
                <img :src="image" alt="" class="h-[75vh] max-w-[95%] object-contain">
            </div>
        </div>
    </div>
    
</template>

<script setup lang="ts">
    import CloseWhite from '../Icon/Etc/CloseWhite.vue';

    const emit = defineEmits(["action"]);
    defineProps<{
        image: any,
        id: any
    }>()

    const confirmAction = () => {
        setTimeout(() => {
            emit("action", () => {});
        }, 20);
    }
</script>