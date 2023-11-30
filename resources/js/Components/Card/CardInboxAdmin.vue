<template>
    <div class="border-b border-silver p-3 flex gap-3">
        <div>
            <Info />
        </div>
        <div class="flex flex-col gap-1">
            <p class="text-neutral-gray-3 text-xs font-light">Informasi</p>
            <p class="text-base font-semibold">Toko Flat kaos bali blackist</p>
            <p class="text-neutral-gray-2 text-sm">Fitur yang akan diupdate berupa pembayaran dengan menggunakan payment gateway yang dapat memudahkan dalam melakukan transaksi apapun</p>
            <img
                src="https://images.unsplash.com/photo-1682685796063-d2604827f7b3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                class="w-40 rounded"
                v-if="type === 'image'"
            >
            <div class="rounded-xl flex-center border border-silver p-2 gap-2 w-fit mt-2" v-if="type === 'file'">
                <File />
                <p class="font-semibold text-sm text-blue">Dafar panduan susuk.pdf</p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    import Info from '../Icon/Etc/Info.vue';
    import File from '../Icon/Etc/File.vue';

    defineProps(["type"])
</script>