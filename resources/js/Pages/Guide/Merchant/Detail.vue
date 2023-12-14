<template>
    <AuthLayout :hide-nav="true">
        <Head :title="'Detail Merchant '+data.name" />
        <HeaderDetail :backUrl="route('guide.merchants.index')" title="Detail Merchant" />
        <img
            :src="data.profile_url" 
            class="w-full h-64 object-cover rounded-lg aspect-video"
        >
        <h1 class="font-bold text-2xl mt-4">
            {{ data.name }}
        </h1>
        <div class="flex justify-between">
            <p class="max-w-[75%] text-neutral-gray-2 text-sm">
                {{ data.full_address }}
            </p>
            <div>
                <Maps />
            </div>
        </div>
        <div class="flex gap-5 mt-2">
            <div class="flex-center gap-2">
                <div>
                    <Pic />
                </div>
                <span class="font-medium text-sm">
                    {{ data.pic_name }}
                </span>
            </div>
            <div class="flex-center gap-2">
                <div>
                    <Whatsapp />
                </div>
                <span class="font-medium text-sm">
                    {{ data.whatsapp_number }}
                </span>
            </div>
        </div>
        <OutlineOrange class="!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mt-4 !cursor-default">
            Komisi: {{ data.full_commission }}
        </OutlineOrange>
        <div class="bg-[#F2F6FE] h-[1px] w-full my-3"></div>

        <span class="text-xs text-neutral-dark-gray">
            Jam & hari operasional
        </span>

        <div class="flex gap-4 mb-6">
            <span class="text-sm">
                <span class="font-medium">Weekdays:</span> {{ data.weekday_time.start }} - {{ data.weekday_time.end }}
            </span>
            <span class="text-sm">
                <span class="font-medium">Weekend:</span> {{ data.weekend_time.start }} - {{ data.weekend_time.end }}
            </span>
            <span class="text-sm">
                <!-- <span class="font-medium">Tutup:</span> Minggu -->
            </span>
        </div>

        <SolidBlue
            class="!font-semibold !text-xs md:!text-sm !px-9 !py-2 justify-center !w-fit"
            @click="() => clickId('popup-booking')"
        >
            Booking
        </SolidBlue>

        <section class="mt-8" v-if="data.products">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >List Produk</h2>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <CardProduct
                    v-for="product in data.products"
                    :data="product"
                />
            </div>
        </section>

        <PopupBooking :id="data.uuid" />
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import Maps from '@/Components/Icon/Etc/Maps.vue';
    import Pic from '@/Components/Icon/Etc/Pic.vue';
    import Whatsapp from '@/Components/Icon/Etc/Whatsapp.vue';
    import OutlineOrange from '@/Components/Button/OutlineOrange.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import CardProduct from '@/Components/Card/CardProduct.vue'
    import PopupBooking from '@/Components/Popup/PopupBooking.vue';
    import { clickId } from '@/plugins/functions/global';

    defineProps(['data'])

</script>