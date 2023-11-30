<template>
    <AuthLayout :hide-nav="true">
        <Head title="Detail Merchant" />
        <HeaderDetail :backUrl="route('guide.merchants.index')" title="Detail Merchant" />
        <img src="https://images.unsplash.com/photo-1682695798256-28a674122872?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            class="w-full h-64 object-cover rounded-lg aspect-video"
        >
        <h1 class="font-bold text-2xl mt-4">
            Toko Krisna Bali
        </h1>
        <div class="flex justify-between">
            <p class="max-w-[75%] text-neutral-gray-2 text-sm">
                Jl. Kutai no 20, Kel. Manguharjo, Kec. Bebekan Timur, Bali
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
                    Brooklyn Simmons
                </span>
            </div>
            <div class="flex-center gap-2">
                <div>
                    <Whatsapp />
                </div>
                <span class="font-medium text-sm">
                    0816 4035 5618
                </span>
            </div>
        </div>
        <OutlineOrange class="!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mt-4">
            Komisi: 15%
        </OutlineOrange>
        <div class="bg-[#F2F6FE] h-[1px] w-full my-3"></div>

        <span class="text-xs text-neutral-dark-gray">
            Jam & hari operasional
        </span>

        <div class="flex gap-4 mb-6">
            <span class="text-sm">
                <span class="font-medium">Weekdays:</span> 08:00 - 21:00
            </span>
            <span class="text-sm">
                <span class="font-medium">Weekend:</span> 08:00 - 21:00
            </span>
            <span class="text-sm">
                <span class="font-medium">Tutup:</span> Minggu
            </span>
        </div>

        <SolidBlue
            :href="route('guide.merchants.detail', 'random')"
            class="!font-semibold !text-xs md:!text-sm !px-9 !py-2 justify-center !w-fit"
        >
            Booking
        </SolidBlue>

        <section class="mt-8">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >List Produk</h2>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <CardProduct />
                <CardProduct />
                <CardProduct />
                <CardProduct />
            </div>
        </section>

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


</script>