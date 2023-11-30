<template>
    <Head title="Beranda" />
    <AuthLayout>
        <div class="-mt-7 py-7 sticky top-0 flex items-center justify-between">
            <Logo />
            <div class="w-1/2 h-12 bg-[#F6F6F6] rounded-xl p-3 flex items-center gap-2">
                <input
                    placeholder="Cari merchant & produk"
                    type="text" name="search" class="w-full font-medium placeholder:text-neutral-gray outline-none border-none bg-transparent p-0 focus:ring-0 text-sm"
                >
            </div>
        </div>
        <Swiper
            :images="banners"
        />
        <h2
            class="font-bold text-lg mb-3"
        >Kategori Merchant</h2>
        <div class="flex gap-3 justify-start items-start overflow-x-auto mb-4">
            <template v-for="category in merchantCategories">
                <SolidBlue class="!text-xs !px-3 !py-[6px] !rounded-full" v-if="category.key === merchantCategory">
                    {{ category.name }}
                </SolidBlue>
                <OutlineGray class="!text-xs !px-3 !py-[6px] !rounded-full" v-if="category.key !== merchantCategory" @click="changeCategory(category.key)">
                    {{ category.name }}
                </OutlineGray>
            </template>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
        </div>
        <OutlineBlue v-if="merchantCategory" class="w-fit mt-5 mx-auto font-medium" :href="route('guide.merchants.category', merchantCategory)">
            Lihat Semua
        </OutlineBlue>

        <section class="mt-8">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >Top Merchants</h2>

                <Link :href="route('guide.merchants.category', 'top-merchants')" class="font-medium text-blue flex items-center gap-2 text-sm">
                    Lihat Semua
                    <i class="isax icon-arrow-right-1 text-xl"></i>
                </Link>
            </div>
            <div class="grid grid-flow-col gap-4 overflow-auto flex-nowrap whitespace-nowrap">
                <CardMerchant class="w-screen-3xs" />
                <CardMerchant class="w-screen-3xs" />
                <CardMerchant class="w-screen-3xs" />
                <CardMerchant class="w-screen-3xs" />
            </div>
        </section>

        <section class="mt-8">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >New Merchants</h2>

                <Link :href="route('guide.merchants.category', 'new-merchants')" class="font-medium text-blue flex items-center gap-2 text-sm">
                    Lihat Semua
                    <i class="isax icon-arrow-right-1 text-xl"></i>
                </Link>
            </div>
            <div class="grid grid-flow-col gap-4 overflow-auto flex-nowrap whitespace-nowrap">
                <CardMerchant class="w-screen-3xs" />
                <CardMerchant class="w-screen-3xs" />
                <CardMerchant class="w-screen-3xs" />
                <CardMerchant class="w-screen-3xs" />
            </div>
        </section>

        <section class="mt-8">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >Special This Month</h2>

                <Link :href="''" class="font-medium text-blue flex items-center gap-2 text-sm">
                    Lihat Semua
                    <i class="isax icon-arrow-right-1 text-xl"></i>
                </Link>
            </div>
            <div class="grid grid-flow-col gap-4 overflow-auto flex-nowrap whitespace-nowrap">
                <CardProduct class="w-screen-4xs" :href="route('guide.merchants.detail', 'random')" />
                <CardProduct class="w-screen-4xs" :href="route('guide.merchants.detail', 'random')" />
                <CardProduct class="w-screen-4xs" :href="route('guide.merchants.detail', 'random')" />
                <CardProduct class="w-screen-4xs" :href="route('guide.merchants.detail', 'random')" />
            </div>
        </section>

        <section class="mt-8">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >Favorite Produk</h2>

                <Link :href="''" class="font-medium text-blue flex items-center gap-2 text-sm">
                    Lihat Semua
                    <i class="isax icon-arrow-right-1 text-xl"></i>
                </Link>
            </div>
            <div class="grid grid-flow-col gap-4 overflow-auto flex-nowrap whitespace-nowrap">
                <CardProduct class="w-screen-4xs" :href="route('guide.merchants.detail', 'random')" />
                <CardProduct class="w-screen-4xs" :href="route('guide.merchants.detail', 'random')" />
                <CardProduct class="w-screen-4xs" :href="route('guide.merchants.detail', 'random')" />
                <CardProduct class="w-screen-4xs" :href="route('guide.merchants.detail', 'random')" />
            </div>
        </section>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import Logo from '@/Components/Icon/Etc/LogoLg.vue';

    import CardMerchant from '@/Components/Card/CardMerchant.vue'
    import CardProduct from '@/Components/Card/CardProduct.vue'
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import OutlineGray from '@/Components/Button/OutlineGray.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import { ref, onMounted } from 'vue'
    import Swiper from '@/Components/Others/Swiper.vue'

    interface MerchantCategory {
        name: string;
        key: string;
    }

    const merchantCategories = ref<MerchantCategory[]>([])
    const merchantCategory = ref('')
    const banners = ref<any>([])

    onMounted(() => {
        merchantCategories.value = [
            {
                name: 'Shopping',
                key: 'shopping'
            },
            {
                name: 'Culinary',
                key: 'culinary'
            },
            {
                name: 'Leisure',
                key: 'leisure'
            },
            {
                name: 'Activities',
                key: 'activities'
            },
            {
                name: 'Others',
                key: 'others'
            },
        ]

        merchantCategory.value = merchantCategories.value.length > 0 ? merchantCategories.value[0].key : ''

        banners.value = [
            'https://images.unsplash.com/photo-1580670029149-5c00eec8bb66?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'https://images.unsplash.com/photo-1580670029149-5c00eec8bb66?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'https://plus.unsplash.com/premium_photo-1680859126181-6f85456f864e?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]
    })

    const changeCategory = (key: string) => {
        merchantCategory.value = key
    }
</script>