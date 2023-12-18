<template>
    <div x-data="{popup: false}">
        <a hidden x-on:click="popup=true" id="popup-payment-bank"></a>
        <Popup title="Informasi Pembayaran">
            <div class="p-4 rounded-lg bg-gray-stroke flex items-center gap-5 mb-5">
                <img :src="$page.props.logo_bca" alt="" class="w-[104px]">
                <div>
                    <p class="text-sm font-medium">{{ $page.props.bank.rekening_number }}</p>
                    <p class="font-semibold">{{ $page.props.bank.rekening_name }}</p>
                </div>
            </div>
            <p class="text-sm text-center mb-8">
                Untuk bukti transfer bisa kirim ke WA Admin SUSUK 
                <span class="font-semibold">{{ $page.props.bank.whatsapp }}</span> untuk verifikasi pembayaran atas pesanan anda.
            </p>

            <SolidBlue class="!px-10 mx-auto" x-on:click="popup=false">
                Close
            </SolidBlue>
        </Popup>
    </div>
</template>

<script setup lang="ts">
    import { clickId } from '@/plugins/functions/global';
    import SolidBlue from '../Button/SolidBlue.vue';
    import Popup from './Popup.vue';
</script>