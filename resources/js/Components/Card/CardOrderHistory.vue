<template>
    <section x-data="{popup: false}">
        <div class="rounded-[14px] border border-silver p-[14px] flex flex-col gap-2 cursor-pointer" v-bind:class="class" x-on:click="popup=true">
            <div class="pb-3 border-b border-silver">
                <div
                    class="grid gap-2 grid-cols-2 justify-between items-start"
                >
                    <div class="">
                        <p class="text-xxs text-neutral-dark-gray mb-[6px]">{{ data.created_at }}</p>
                        <p class="text-sm font-semibold whitespace-nowrap">{{ data.type }}</p>
                    </div>
                    <div
                        class="rounded-full px-3 py-1 text-xxs font-medium border w-fit ms-auto"
                        :class="{
                            'border-[#F9B700] text-[#F9B700] bg-[#FFFDEF]': data.status == 'waiting_payment',
                            'border-[#53C16E] text-[#53C16E] bg-[#F2FFF7]': data.status == 'paid',
                            'border-[#FB4141] text-[#FB4141] bg-red-thin': data.status == 'failed' || data.status == 'expired'
                        }"
                    >{{ data.status_formated }}</div>
                </div>
            </div>
            <div class="pt-3">
                <div
                    class="grid grid-cols-2 gap-2 justify-between"
                >
                    <div class="">
                        <p class="text-xxs text-neutral-dark-gray mb-[6px]">Harga</p>
                        <p class="text-sm font-semibold">{{ data.price }}</p>
                    </div>
                    <div class="ms-auto" v-if="data.benefit_type != 'product'">
                        <p class="text-xxs text-neutral-dark-gray mb-[6px]">Expired</p>
                        <p class="text-sm font-semibold">{{ data.expired_at }}</p>
                    </div>
                    <div class="ms-auto" v-if="data.benefit_type == 'product'">
                        <p class="text-xxs text-neutral-dark-gray mb-[6px]">Jumlah Produk</p>
                        <p class="text-sm font-semibold">{{ data.benefit_formated }}</p>
                    </div>
                </div>
                <div class="mt-3" v-if="data.image_url">
                    <img :src="data.image_url" alt="" class="w-[200px]">
                </div>
            </div>
        </div>

        <Popup title="Detail Pembelian">
            <div class="flex-center flex-col gap-4 rounded-2xl border border-gray-stroke p-3 mb-4">
                <p class="text-base font-semibold">
                    {{ data.type }}
                </p>
                <div class="flex items-center justify-around py-2 px-4 rounded bg-[#F1F8FF] w-full">
                    <div class="flex-center flex-col gap-1">
                        <p class="text-neutral-gray-3 text-xs">
                            {{ data.benefit_type == 'product' ? 'Jumlah Produk' : 'Masa Tayang' }}
                        </p>
                        <p class="text-xs font-medium">
                            {{ data.benefit_formated }}
                        </p>
                    </div>
                    <div class="flex-center flex-col gap-1" v-if="data.benefit_type != 'product'">
                        <p class="text-neutral-gray-3 text-xs">
                            Expired
                        </p>
                        <p class="text-xs font-medium">
                            {{ data.expired_at }}
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-between items-center mb-2">
                <p class="text-xs text-neutral-dark-gray">
                    Tanggal Pembelian
                </p>
                <p class="text-xs font-medium">
                    {{ data.created_at }}
                </p>
            </div>

            <div class="flex justify-between items-center mb-2">
                <p class="text-xs text-neutral-dark-gray">
                    Harga
                </p>
                <p class="text-xs font-medium">
                    {{ data.price }}
                </p>
            </div>

            <div class="flex justify-between items-center mb-2">
                <p class="text-xs text-neutral-dark-gray">
                    Status Pembayaran
                </p>
                <p
                    class="text-xs font-medium"
                    :class="{
                        'text-red': data.status == 'failed' || data.status == 'expired',
                        'text-green': data.status == 'paid',
                        'text-neutral-gray-2': data.status == 'waiting_payment'
                    }"
                >
                    {{ data.status_formated }}
                </p>
            </div>
        </Popup>
        
    </section>
</template>

<script setup lang="ts">
    import Popup from '../Popup/Popup.vue';

    defineProps<{
        data: any;
        class?: any;
    }>()

</script>