<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex flex-col gap-2" v-bind:class="class" @click="confirmAction" :class="withAction ? 'cursor-pointer' : ''">
        <img src="https://plus.unsplash.com/premium_photo-1698442704192-086265cf630e?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            class="w-full h-48 object-cover rounded-lg mb-1"
        >
        <p class="mb-1 font-medium text-base whitespace-pre-wrap">Tas bahan kayu rotan</p>
        <p class="mb-1 text-lg text-neutral-dark-gray whitespace-pre-wrap font-bold">Rp150.000</p>
        <p class="mb-2 text-xxs text-neutral-gray-2 line-clamp-2 whitespace-pre-wrap">Tas Selempang Bulat berbentuk Kendi/Bola Decoupage BUNGA SESUAI FOTO Diameter 20cm</p>
        <OutlineOrange class="!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full">
            Komisi: 15%
        </OutlineOrange>
    </div>
</template>

<script setup lang="ts">
    import OutlineOrange from "../Button/OutlineOrange.vue";

    const emit = defineEmits(["action"]);

    defineProps<{
        class?: any,
        withAction?: boolean
    }>()

    const confirmAction = () => {
        emit("action", () => {
        });
    }

</script>