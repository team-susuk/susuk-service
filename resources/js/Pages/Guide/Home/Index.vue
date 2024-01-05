<template>
    <Head title="Beranda" />
    <AuthLayout>
        <div class="-mt-7 py-7 sticky top-0 flex items-center justify-between">
            <Logo />
            <div class="w-1/2 h-12 bg-[#F6F6F6] rounded-xl p-3 flex items-center gap-2">
                <input
                    placeholder="Cari merchant & produk"
                    type="text" name="search" class="w-full font-medium placeholder:text-neutral-gray outline-none border-none bg-transparent p-0 focus:ring-0 text-sm"
                    v-model="search"
                    @keydown.enter="submitSearch"
                >
                <i class="isax icon-search-normal-1 text-neutral-gray cursor-pointer" @click="submitSearch"></i>
            </div>
        </div>
        <Swiper
            :images="popupBanners"
        />
        <h2
            class="font-bold text-lg mb-3 mt-6"
        >Kategori Merchant</h2>
        <div class="flex gap-3 justify-start items-start overflow-x-auto mb-4">
            <template v-for="category in categories">
                <SolidBlue class="!text-xs !px-3 !py-[6px] !rounded-full" v-if="category.uuid === merchantCategory">
                    {{ category.name }}
                </SolidBlue>
                <OutlineGray class="!text-xs !px-3 !py-[6px] !rounded-full" v-if="category.uuid !== merchantCategory" @click="changeCategory(category.uuid)">
                    {{ category.name }}
                </OutlineGray>
            </template>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4" v-if="loading">
            <CardMerchantLoading />
            <CardMerchantLoading />
            <CardMerchantLoading />
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4" v-if="!loading && merchantCategories?.length > 0">
            <CardMerchant
                v-for="merchant in merchantCategories"
                :data="merchant"
                :back_url="route('guide.home')+'?category='+merchantCategory"
            />
        </div>

        <OutlineBlue v-if="merchantCategory && !loading && merchantCategories?.length > 0" class="w-fit mt-5 mx-auto font-medium" :href="route('guide.merchants.category', merchantCategory)">
            Lihat Semua
        </OutlineBlue>

        <section class="mt-8" v-if="top_merchants?.length > 0">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >Top Merchants</h2>

                <Link :href="route('guide.merchants.featured', 'top-merchants')" class="font-medium text-blue flex items-center gap-2 text-sm">
                    Lihat Semua
                    <i class="isax icon-arrow-right-1 text-xl"></i>
                </Link>
            </div>
            <div class="grid grid-flow-col gap-4 overflow-auto flex-nowrap whitespace-nowrap">
                <CardMerchant
                    class="w-screen-3xs"
                    v-for="merchant in top_merchants"
                    :data="merchant"
                />
            </div>
        </section>

        <section class="mt-8" v-if="new_merchants?.length > 0">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >New Merchants</h2>

                <Link :href="route('guide.merchants.featured', 'new-merchants')" class="font-medium text-blue flex items-center gap-2 text-sm">
                    Lihat Semua
                    <i class="isax icon-arrow-right-1 text-xl"></i>
                </Link>
            </div>
            <div class="grid grid-flow-col gap-4 overflow-auto flex-nowrap whitespace-nowrap">
                <CardMerchant
                    class="w-screen-3xs"
                    v-for="merchant in new_merchants"
                    :data="merchant"
                    :back_url="route('guide.home')"
                />
            </div>
        </section>

        <section class="mt-8" v-if="special_products?.length > 0">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >Special This Month</h2>

                <Link :href="route('guide.products.category', 'special-this-month')" class="font-medium text-blue flex items-center gap-2 text-sm">
                    Lihat Semua
                    <i class="isax icon-arrow-right-1 text-xl"></i>
                </Link>
            </div>
            <div class="grid grid-flow-col gap-4 overflow-auto flex-nowrap whitespace-nowrap">
                <CardProduct
                    class="w-screen-4xs"
                    v-for="product in special_products"
                    :data="product"
                    :href="route('guide.merchants.detail', product.merchant_id)"
                    :back_url="route('guide.home')"
                />
            </div>
        </section>

        <section class="mt-8" v-if="favorite_products?.length > 0">
            <div class="flex items-center justify-between mb-3">
                <h2
                    class="font-bold text-lg"
                >Favorite Produk</h2>

                <Link :href="route('guide.products.category', 'favorite-product')" class="font-medium text-blue flex items-center gap-2 text-sm">
                    Lihat Semua
                    <i class="isax icon-arrow-right-1 text-xl"></i>
                </Link>
            </div>
            <div class="grid grid-flow-col gap-4 overflow-auto flex-nowrap whitespace-nowrap">
                <CardProduct
                    class="w-screen-4xs"
                    v-for="product in favorite_products"
                    :data="product"
                    :href="route('guide.merchants.detail', product.merchant_id)"
                    :back_url="route('guide.home')"
                />
            </div>
        </section>
    </AuthLayout>

    <PopupBank />
    <section>
        <PopupHome
            v-for="(image, id) in advertisement"
            :image="image"
            :id="'popup-advertisement-'+id"
            @action="closeAndOpenAds(id)"
        />
    </section>
</template>

<script setup lang="ts">
    import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import Logo from '@/Components/Icon/Etc/LogoLg.vue';

    import CardMerchant from '@/Components/Card/CardMerchant.vue'
    import CardMerchantLoading from '@/Components/Card/CardMerchantLoading.vue'
    import CardProduct from '@/Components/Card/CardProduct.vue'
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import OutlineGray from '@/Components/Button/OutlineGray.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import { ref, onMounted } from 'vue'
    import Swiper from '@/Components/Others/Swiper.vue'
    import PopupHome from '@/Components/Popup/PopupHome.vue';
    import PopupBank from '@/Components/Popup/PopupBank.vue';
    import { clickId, getQueryParam } from '@/plugins/functions/global';
    import axios from 'axios';
    

    const props = defineProps([
        "banners",
        "categories",
        "top_merchants",
        "new_merchants",
        "favorite_products",
        "special_products",
        "top_advertisements"
    ])

    const merchantCategory = ref('')
    const popupBanners = ref<any>([])
    const advertisement = ref<any>([])
    const merchantCategories = ref<any>([])
    const loading = ref(false)

    const search = ref("")

    onMounted(() => {
        let category = ''
        let paramCategory = getQueryParam('category')
        if (props.categories.length > 0) {
            for (let row of props.categories) {
                if (paramCategory == row.uuid) {
                    category = row.uuid
                    break
                } else {
                    category = props.categories[0].uuid
                }
            }

        }
        merchantCategory.value = category

        props.banners.map((row: any) => {
            popupBanners.value.push({
                image: row.image,
                merchant_id: row.merchant_id
            })
        })

        props.top_advertisements.map((row: any) => {
            advertisement.value.push({
                image: row.image_url,
                user_id: row.user_id
            })
        })

        setTimeout(() => {
            closeAndOpenAds(-1)
            getMerchantCategories()
        }, 100)
    })

    const changeCategory = (key: string) => {
        merchantCategory.value = key
        getMerchantCategories()
    }

    const closeAndOpenAds = (id: number) => {
        let openPlan = window.localStorage.getItem("susuk-popup") 
        let element = document.getElementById('popup-advertisement-'+(id+1)) as any
        if (element && !openPlan) {
            window.localStorage.setItem("susuk-popup", "open")
            element?.click()
        } else {
            if (!usePage().props.auth.guide.is_member && !openPlan) {
                window.localStorage.setItem("susuk-popup", "open")
                clickId("popup-plan-guide")
            }
        }
    }

    const getMerchantCategories = () => {
        loading.value = true
        axios.get(route("guide.home.merchant-categories", merchantCategory.value))
        .then((res: any) => {
            merchantCategories.value = res.data.merchants
        }).finally(() => loading.value = false)
    }

    const submitSearch = () => {
        if (search.value) {
            router.visit(route('guide.home.search', search.value))
        }
    }
</script>