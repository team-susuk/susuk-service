<template>
    <div x-data="{popup: false}">
        <a hidden x-on:click="popup=true" id="popup-bank"></a>
        <Popup title="Upgrade Berlangganan">
            <div class="flex flex-col">
                <div class="bg-gold-1 rounded-t-lg py-3 text-white font-semibold flex-center">
                    Berlangganan
                </div>
                <div class="p-6 rounded-b-lg border border-[#D5DFFF] flex flex-col items-center">
                    <p class="text-sm mb-10">Dapat melihat semua info merchant dan susuk</p>
                    <div class="flex-center gap-2 mb-4">
                        <p class="line-through text-neutral-gray-2 font-medium text-sm">
                            Rp150.000
                        </p>
                        <p class="border border-[#66B2E5] bg-[#CCECFA] rounded-full text-blue text-xs font-semibold px-[10px] py-[6px]">
                            Diskon 100%
                        </p>
                    </div>
                    <p class="text-base mb-10">
                        Rp<span class="font-bold text-[40px]">0</span>/bln
                    </p>
                    <SolidBlue class="!px-10" @click="() => clickId('popup-payment-bank')" x-on:click="popup=false">
                        Bayar Sekarang
                    </SolidBlue>
                </div>
            </div>
        </Popup>
    </div>

    <div x-data="{popup: false}">
        <a hidden x-on:click="popup=true" id="popup-payment-bank"></a>
        <Popup title="Informasi Pembayaran">
            <div class="p-4 rounded-lg bg-gray-stroke flex items-center gap-5 mb-5">
                <img :src="$page.props.logo_bca" alt="" class="w-[104px]">
                <div>
                    <p class="text-sm font-medium">PT Aplikasi Solusi Anak Bangsa</p>
                    <p class="font-semibold">4979567780</p>
                </div>
            </div>
            <p class="text-sm text-center mb-8">
                Untuk bukti transfer bisa kirim ke WA Admin SUSUK 
                <span class="font-semibold">0817 821 817</span> untuk verifikasi pembayaran atas pesanan anda.
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