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

            <Link :href="route('merchant.home.edit')" class="bg-[#CBE4FF] rounded-md px-4 py-2 text-sm font-semibold text-blue flex-center gap-1 ms-auto">
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
                <div v-for="promotion in packages" :key="promotion.name" class="rounded-[10px] bg-white p-4 flex cursor-pointer gap-2" @click="selectPromotion(promotion)">
                    <div>
                        <template v-if="promotion.type == 'top-ads'"><TopAdvertisement /></template>
                        <template  v-if="promotion.type == 'ads-banner'"><AdvertisementBanner /></template>
                        <template  v-if="promotion.type == 'blast'"><BlastInfo /></template>
                        <template v-if="promotion.type == 'top-merchants'"><TopMerchant /></template>
                        <template v-if="promotion.type == 'new-merchants'"><NewMerchant /></template>
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
                :href="route('merchant.order.merchant.histories')"
            >
                Histori Pembelian Promosi
            </SolidBlue>
        </div>
        <section class="mt-8">
            <div class="flex items-center justify-between mb-4">
                <h2
                    class="font-bold text-lg"
                >List Produk</h2>

                <OutlineBlue
                    @click="addProduct"
                    class="!h-[38px] flex-center"
                >
                    Tambah Produk
                </OutlineBlue>
            </div>
            <div class="mb-4 rounded-full py-2 px-4 bg-red-thin border border-red text-red flex items-center w-full gap-2"
                v-if="checkMaxProduct()"
            >
                <i class="isax-b icon-danger text-md"></i> <span class="text-[11px] font-medium">Maximal 9 item produk, untuk lebih dari 9 silahkan membeli paket “Tambah Produk”</span>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <CardProduct
                    v-for="product in products"
                    :data="product"
                    :href="route('merchant.products.detail', product.uuid)"
                />
            </div>
            <div class="flex-center my-4">
                <EmptyState
                    v-if="!products.length"
                />
            </div>
        </section>

        <section x-data="{popup: false}">
            <a hidden x-on:click="popup=!popup" id="show-select-package"></a>
            <Popup v-bind:title="promotionTitle" class="!max-w-xl md:!max-w-3xl">
                <div class="flex flex-col md:flex-row gap-4 relative">
                    <div v-if="formOrder.processing" class="absolute bg-white opacity-50 top-0 right-0 bottom-0 left-0 rounded-lg"></div>
                    <div v-if="formOrder.processing" class="absolute top-0 right-0 bottom-0 left-0 rounded-lg flex-center">
                        <LoadingButton class="text-blue" />
                    </div>
                    <div v-for="selected in selectedPackages" :key="selected.id" class="flex flex-col overflow-hidden">
                        <div class="bg-gold-1 p-3 text-lg md:text-xl font-semibold text-white rounded-t-lg">
                            {{ selected.name }}
                        </div>
                        <div class="p-5 border border-[#D5DFFF] rounded-b-lg text-center">
                            <p class="text-sm mb-10">
                                {{ selected.description }}
                            </p>
                            <div class="flex-center gap-2 mb-4" v-if="selected.discount > 0">
                                <p class="line-through text-neutral-gray-2 font-medium text-sm">
                                    Rp{{ selected.inactive_price_formated }}
                                </p>
                                <p class="border border-[#66B2E5] bg-[#CCECFA] rounded-full text-blue text-xs font-semibold px-[10px] py-[6px]">
                                    Diskon {{ selected.discount_type == 'percent' ? `${selected.discount}%` : `Rp${selected.discount_formated}` }}
                                </p>
                            </div>
                            <p class="text-base mb-10">
                                Rp<span class="font-bold text-[40px]">{{ selected.price_formated }}</span>/ {{ selected.type_formated }}
                            </p>
                            <SolidBlue class="!px-10 mx-auto" @click="subscribe(selected.id)" v-if="!formOrder.processing">
                                Bayar Sekarang
                            </SolidBlue>
                        </div>
                    </div>
                </div>
            </Popup>
        </section>

        <section x-data="{popup: false}">
            <a hidden x-on:click="popup=!popup" id="show-select-image"></a>
            <Popup v-bind:title="promotionTitle">
                <div class="flex flex-col gap-4">
                    <DropZoneImage
                        label="Upload Image"
                        id="dropzone_image"
                        name="image"
                        v-model="formOrder.image"
                        v-if="hasPackageImage"
                        :error="formOrder.errors.image"
                    />
                    
                    <div class="flex-center w-full gap-4">
                        <OutlineBlue class="justify-center" x-on:click="popup=false">
                            Kembali
                        </OutlineBlue>
                        <SolidBlue
                            class="justify-center font-semibold"
                            :disabled="
                                !formOrder.image
                            "
                            @click="payment"
                        >
                            Pembayaran
                        </SolidBlue>
                    </div>
                </div>
            </Popup>
        </section>

        <section x-data="{popup: false}">
            <a hidden x-on:click="popup=!popup" id="show-select-blast"></a>
            <Popup v-bind:title="promotionTitle">
                <div class="flex flex-col gap-4">
                    <div class="grid grid-cols-2 gap-x-3">
                        <div class="col-span-2">
                            <Select
                                label="Profesi"
                                id="profession"
                                name="profession"
                                v-model="formOrder.profession"
                            >
                                <option value="guide">Guide</option>
                                <option value="driver">Driver</option>
                                <option value="freelance">Freelance</option>
                            </Select>
                        </div>
                        <div class="col-span-2">
                            <label
                                class="text-[12px] text-dark mb-1 block"
                            >
                                Asal Guide
                            </label>
                        </div>
                        <div>
                            <Single
                                v-if="regions"
                                placeholder="Pilih Provinsi"
                                label=""
                                :data="regions"
                                id="province"
                                v-model="formOrder.province"
                                :selected="formOrder.province"
                                :popup="true"
                            />
                        </div>
                        <div>
                            <Single
                                v-if="hasCity"
                                placeholder="Pilih Kabupaten"
                                label=""
                                v-bind:data="cities"
                                id="city"
                                v-model="formOrder.city"
                                :selected="formOrder.city"
                                :popup="true"
                            />
                        </div>
                        <div class="col-span-2 mb-3">
                            <MultipleLanguage
                                label="Bahasa"
                                :category="languages"
                                id="languages"
                                :popup="true"
                                v-model="formOrder.languages"
                            />
                        </div>
                    </div>
                    
                    <div class="flex-center w-full gap-4">
                        <OutlineBlue class="justify-center" x-on:click="popup=false">
                            Kembali
                        </OutlineBlue>
                        <SolidBlue
                            class="justify-center font-semibold"
                            :disabled="
                                !formOrder.profession ||
                                !formOrder.province ||
                                !formOrder.city ||
                                !formOrder.languages.length
                            "
                            @click="payment"
                        >
                            Pembayaran
                        </SolidBlue>
                    </div>
                </div>
            </Popup>
        </section>

        <PopupBank />
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
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
    import { watch, ref } from 'vue'
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import CardProduct from '@/Components/Card/CardProduct.vue'
    import EmptyState from '@/Components/Icon/Image/EmptyState.vue';
    import Popup from '@/Components/Popup/Popup.vue';
    import { clickId } from '@/plugins/functions/global';
    import PopupBank from '@/Components/Popup/PopupBank.vue';
    import DropZoneImage from '@/Components/Input/DropZoneImage.vue';
    import MultipleLanguage from '@/Components/Input/Select/MultipleLanguage.vue';
    import Single from '@/Components/Input/Select/Single.vue';
    import Select from '@/Components/Input/Select/Index.vue'
    import LoadingButton from '@/Components/Icon/Etc/LoadingButton.vue';

    const props = defineProps(["products", "merchant", "packages", "regions", "languages", "max_products"])

    const formOrder = useForm({
        type: '',
        image: null,
        package_id: '',
        languages: [],
        profession: 'Guide',
        province: '',
        city: ''
    })

    const promotionTitle = ref('')
    const selectedPackages: any = ref([])
    const hasPackageImage = ref(true)
    const hasCity = ref(true)
    const cities = ref([])

    const checkMaxProduct = () => {
        return props.products?.length >= props.max_products
    }

    const selectPromotion = (promotion: any) => {
        selectedPackages.value = promotion.packages
        promotionTitle.value = "Promosi " + promotion.name
        formOrder.image = null

        formOrder.type = promotion.type
        if (promotion.type == 'top-ads' || promotion.type == 'ads-banner') {
            hasPackageImage.value = false
            setTimeout(() => {
                hasPackageImage.value = true
                clickId('show-select-image')
            }, 100)
        } else if (promotion.type == 'blast') {
            clickId('show-select-blast')
        } else {
            clickId('show-select-package')
        }
    }

    watch(
    () => formOrder.province,
    (oldValue, newValue) => {
        hasCity.value = false
        setCities()
    });

    const setCities = () => {
        props.regions.filter((row: any) => {
            if (row.id == formOrder.province) {
                let city = formOrder.city
                cities.value = row.cities
                formOrder.city = ''
                cities.value.map((subrow: any) => {
                    if (subrow.id == city) {
                        formOrder.city = city
                    }
                })

                setTimeout(() => {
                    hasCity.value = true
                }, 100)
            }
        })
    }

    const subscribe = (packageId: string) => {
        formOrder.package_id = packageId

        if (!formOrder.processing) {
            formOrder.post(route("merchant.order.merchant"), {
            onSuccess: () => {
                clickId('show-select-package')
                setTimeout(() => {
                    clickId('popup-payment-bank')
                }, 100)
            }
        })
        }
    }

    const payment = () => {
        if (formOrder.type == 'top-ads' || formOrder.type == 'ads-banner') {
            clickId('show-select-image')
        } else if (formOrder.type == 'blast') {
            clickId('show-select-blast')
        }
        clickId('show-select-package')
    }

    const addProduct = () => {
        if (!checkMaxProduct()) {
            router.visit(route('merchant.products.add'))
        }
    }
</script>