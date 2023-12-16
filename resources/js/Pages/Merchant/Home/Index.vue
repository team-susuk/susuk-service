<template>
    <Head title="Beranda" />
    <AuthLayout>
        <HeaderBlue title="My Merchant" />

        <img
            :src="merchant.profile_url" 
            class="w-full h-64 object-cover rounded-lg aspect-video"
        >
        <div class="flex items-center justify-between">
            <h1 class="font-bold text-2xl mt-4">
                {{ merchant.name }}
            </h1>
            <span class="text-xs text-neutral-dark-gray font-medium flex-center gap-1">
                <i class="isax icon-eye text-base"></i> {{ merchant.viewer }} viewers
            </span>
        </div>
        <div class="flex justify-between mt-4">
            <p class="max-w-[75%] text-neutral-gray-2 text-sm">
                {{ merchant.full_address }}
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
                    {{ merchant.pic_name }}
                </span>
            </div>
            <div class="flex-center gap-2">
                <div>
                    <Whatsapp />
                </div>
                <span class="font-medium text-sm">
                    {{ merchant.whatsapp_number }}
                </span>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <span class="!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mt-4 border border-neutral-gray-3 bg-[#E4EBF4] text-neutral-dark-gray">
                {{ $page.props.auth.merchant.category }}
            </span>
            <OutlineOrange class="!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mt-4 !cursor-default">
                Komisi: {{ merchant.full_commission }}
            </OutlineOrange>

            <Link href="" class="bg-[#CBE4FF] rounded-md px-4 py-2 text-sm font-semibold text-blue flex-center gap-1 ms-auto">
                <i class="isax-b icon-edit-2 text-xl"></i> Ubah Toko
            </Link>
        </div>

        <div class="bg-[#F2F6FE] h-[1px] w-full my-3"></div>
        <div class="mb-3">
            <p class="text-xs text-neutral-dark-gray">Jam & hari operasional</p>
            <span class="text-sm me-4"><span class="font-medium">Weekdays:</span> {{ merchant.weekday_time.start }} - {{ merchant.weekday_time.end }}</span>
            <span class="text-sm me-4"><span class="font-medium">Weekend:</span> {{ merchant.weekend_time.start }} - {{ merchant.weekend_time.end }}</span>
        </div>
        <div class="mb-6">
            <p class="text-xs text-neutral-dark-gray">Deskripsi Toko</p>
            <span class="text-sm me-4 font-medium">{{ merchant.description }}</span>
        </div>
        <div class="p-4 rounded-md bg-[#F2F7FC]">
            <p class="text-sm font-semibold text-neutral-dark-gray">Fitur Promosi</p>
            <p class="text-xs text-neutral-dark-gray">Pilih Fitur Promosi sesuai dengan Kebutuhan tokomu</p>

            <div class="grid grid-cols-2 gap-4 my-4">
                <div v-for="promotion in promotions" :key="promotion.name" class="rounded-[10px] bg-white p-4 flex cursor-pointer gap-2" @click="promotion.action">
                    <div>
                        <component :is="promotion.icon"></component>
                    </div>
                    <div>
                        <p class="text-sm font-semibold mb-1">{{ promotion.name }}</p>
                        <p class="text-xs text-black">{{ promotion.description }}</p>
                    </div>
                </div>
            </div>
            <SolidBlue
                icon="isax icon-note-21"
                class="font-medium w-full mt-6"
            >
                Histori Pembelian Promosi
            </SolidBlue>
        </div>
        <section class="mt-8">
            <div class="flex items-center justify-between mb-4">
                <h2
                    class="font-bold text-lg"
                >List Produk</h2>

                <OutlineBlue class="!h-[38px] flex-center">
                    Tambah Produk
                </OutlineBlue>
            </div>
            <div class="mb-4 rounded-full py-2 px-4 bg-red-thin border border-red text-red flex items-center w-full gap-2" v-if="products?.length >= 9 && !$page.props.auth.merchant.is_member">
                <i class="isax-b icon-danger text-md"></i> <span class="text-[11px] font-medium">Maximal 9 item produk, untuk lebih dari 9 silahkan membeli paket “Tambah Produk”</span>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <CardProduct
                    v-for="product in products"
                    :data="product"
                />
            </div>
            <div class="flex-center my-4">
                <EmptyState
                    v-if="!products.length"
                />
            </div>
        </section>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue';
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue';
    import Pic from '@/Components/Icon/Etc/Pic.vue';
    import Whatsapp from '@/Components/Icon/Etc/Whatsapp.vue';
    import OutlineOrange from '@/Components/Button/OutlineOrange.vue';
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import TopAdvertisement from '@/Components/Icon/Image/TopAdvertisement.vue';
    import AdvertisementBanner from '@/Components/Icon/Image/AdvertisementBanner.vue';
    import BlastInfo from '@/Components/Icon/Image/BlastInfo.vue';
    import TopMerchant from '@/Components/Icon/Image/TopMerchant.vue';
    import NewMerchant from '@/Components/Icon/Image/NewMerchant.vue';
    import { shallowRef, ref } from 'vue'
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import CardProduct from '@/Components/Card/CardProduct.vue'
    import EmptyState from '@/Components/Icon/Image/EmptyState.vue';

    defineProps(["products", "merchant"])

    const promotions = ref([
        {
            name: "Top Ads",
            description: "Iklan ini akan muncul setelah guide login ke aplikasi (Tampilan Iklan satu Layar)",
            icon: shallowRef(TopAdvertisement),
            action: ()=>{}
        },
        {
            name: "Ads Banner",
            description: "Iklan ini akan muncul di halaman utama beranda pada aplikasi guide",
            icon: shallowRef(AdvertisementBanner),
            action: ()=>{}
        },
        {
            name: "Blast Info Merchant",
            description: "Blast pesan ke semua guide yang dikehendaki",
            icon: shallowRef(BlastInfo),
            action: ()=>{}
        },
        {
            name: "Top Merchants",
            description: "Promosikan Tokomu sebagai Top Merchant agar dilihat semua guide",
            icon: shallowRef(TopMerchant),
            action: ()=>{}
        },
        {
            name: "New Merchants",
            description: "Promosikan Toko Baru Kamu agar dapat dilihat oleh semua guide.",
            icon: shallowRef(NewMerchant),
            action: ()=>{}
        }
    ])
</script>