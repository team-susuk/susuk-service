<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex gap-3" v-bind:class="class">
        <img src="https://images.unsplash.com/photo-1700413739071-d7ca09f1eb7b?q=80&w=1972&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            class="w-36 object-cover rounded-lg h-fit"
        >
        <div class="w-full">
            <div class="flex items-center justify-between">
                <div class="flex items-start justify-start gap-2">
                    <div>
                        <MerchantFill class="w-5" />
                    </div>
                    <p class="mb-0 font-semibold text-sm text-blue-2 whitespace-pre-wrap">Toko Krisna Bali</p>
                </div>
                <p class="text-xs font-medium text-neutral-gray">10:00</p>
            </div>
            <p class="text-neutral-gray-2 text-xs my-2">
                Jl. Kutai no 20, Kel. Manguharjo, Kec. Bebekan Timur, Bali
            </p>
            <div class="flex mt-2 gap-1">
                <div class="flex gap-2">
                    <div class="flex-center gap-1">
                        <div>
                            <Pic class="w-5" />
                        </div>
                        <span class="font-medium text-xxs">
                            Brooklyn Simmons
                        </span>
                    </div>
                    <div class="flex-center gap-1">
                        <div>
                            <Whatsapp class="w-5" />
                        </div>
                        <span class="font-medium text-xxs">
                            0816 4035 5618
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 justify-between items-center pt-2 border-t border-silver mt-2">
                <p class="text-sm font-medium">Tas bahan kayu rotan</p>
                <div class="ms-auto">
                    <OutlineOrange class="!font-semibold !text-xxs !px-0 !w-24 !h-6 justify-center !rounded-full !cursor-default">
                        Komisi: 15%
                    </OutlineOrange>
                </div>
            </div>
            <p class="text-sm font-bold">Rp150.000</p>
            <div class="flex gap-3 mt-4">
                <SolidBlue
                    :href="route('guide.merchants.detail', 'random')"
                    class="!font-semibold !text-xs md:!text-sm !h-8 justify-center !w-fit"
                >
                    Booking
                </SolidBlue>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    import MerchantFill from "@/Components/Icon/Etc/MerchantFill.vue";
    import Maps from '@/Components/Icon/Etc/Maps.vue';
    import Pic from '@/Components/Icon/Etc/Pic.vue';
    import Whatsapp from '@/Components/Icon/Etc/Whatsapp.vue';
    import OutlineOrange from '@/Components/Button/OutlineOrange.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
</script>