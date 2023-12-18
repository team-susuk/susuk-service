<template>
    <div x-data="{popup: false}">
        <a hidden x-on:click="popup=!popup" id="popup-plan-merchant"></a>
        <Popup title="Upgrade Berlangganan">
            <div class="flex flex-col">
                <div class="bg-gold-1 rounded-t-lg py-3 text-white font-semibold flex-center">
                    {{ plan?.name }}
                </div>
                <div class="p-6 rounded-b-lg border border-[#D5DFFF] flex flex-col items-center">
                    <p class="text-sm mb-10">Dapat melihat semua info merchant dan susuk</p>
                    <div class="flex-center gap-2 mb-4">
                        <p class="line-through text-neutral-gray-2 font-medium text-sm" v-if="plan?.discount > 0">
                            Rp{{ plan?.inactive_price_formated }}
                        </p>
                        <p class="border border-[#66B2E5] bg-[#CCECFA] rounded-full text-blue text-xs font-semibold px-[10px] py-[6px]">
                            Diskon {{ plan?.discount_type == 'percent' ? `${plan?.discount}%` : `Rp${plan?.discount_formated}` }}
                        </p>
                    </div>
                    <p class="text-base mb-10">
                        Rp<span class="font-bold text-[40px]">{{ plan?.price_formated }}</span>/ {{ plan?.type_formated }}
                    </p>
                    <SolidBlue class="!px-10" @click="subscribe">
                        Bayar Sekarang
                    </SolidBlue>
                </div>
            </div>
        </Popup>
    </div>
</template>

<script setup lang="ts">
    import { clickId } from '@/plugins/functions/global';
    import SolidBlue from '../Button/SolidBlue.vue';
    import Popup from './Popup.vue';
    import axios from 'axios';
    import { onMounted, ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';

    const plan = ref<any>(null)

    const formOrder = useForm({
        package_id: '',
        type: ''
    })

    onMounted(() => {
        axios.get(route('utils.subscription', 'merchant'))
        .then((res: any) => {
            plan.value = res.data
        })
    })

    const subscribe = () => {
        formOrder.package_id = plan.value?.id
        formOrder.type = plan.value?.type

        if (!formOrder.processing) {
            formOrder.post(route("merchant.order.merchant"), {
            onSuccess: () => {
                clickId('popup-plan-merchant')
                setTimeout(() => {
                    clickId('popup-payment-bank')
                }, 100)
            }
        })
        }
    }

</script>