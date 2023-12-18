<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex flex-col gap-2" v-bind:class="class">
        <div class="pb-3 border-b border-silver">
            <div class="grid grid-cols-2 gap-2 justify-between items-start">
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
            <div class="grid grid-cols-2 gap-2 justify-between">
                <div class="">
                    <p class="text-xxs text-neutral-dark-gray mb-[6px]">Harga</p>
                    <p class="text-sm font-semibold">{{ data.price }}</p>
                </div>
                <div class="">
                    <p class="text-xxs text-neutral-dark-gray mb-[6px]">Expired</p>
                    <p class="text-sm font-semibold">{{ data.expired_at }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    defineProps<{
        data: any;
        class?: any;
    }>()

</script>