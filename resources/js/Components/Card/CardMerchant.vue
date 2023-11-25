<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex flex-col gap-2" v-bind:class="class">
        <img src="https://images.unsplash.com/photo-1682695798256-28a674122872?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            class="w-full h-24 object-cover rounded-lg"
        >
        <div class="flex items-start justify-start gap-2">
            <div>
                <MerchantFill />
            </div>
            <p class="mb-0 font-semibold text-xs text-blue-2 whitespace-pre-wrap">Toko Krisna Bali</p>
        </div>
        <p class="mb-0 text-xxs text-neutral-gray-2 line-clamp-2 whitespace-pre-wrap">Jl. Kutai no 20, Kel. Manguharjo, Kec. Bebekan Timur, Surabaya</p>
        <p class="mb-1 text-xs text-orange whitespace-pre-wrap font-semibold">Komisi: 10% - 20%</p>
        <SolidBlue class="!font-semibold !text-xs !md:text-sm !px-4 !py-2 justify-center">
            Lihat merchant
        </SolidBlue>
    </div>
</template>

<script setup lang="ts">
    import SolidBlue from "../Button/SolidBlue.vue";
    import MerchantFill from "../Icon/Etc/MerchantFill.vue";

    defineProps<{
        class?: any
    }>()

</script>