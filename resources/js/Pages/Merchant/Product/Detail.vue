<template>
    <AuthLayout :hide-nav="true">
        <Head title="Detail Produk" />
        <HeaderDetail :backUrl="route('merchant.home')" title="Detail Produk" />

        <div class="flex flex-col lg:flex-row gap-5">
            <div class="flex-shrink-0">
                <img
                    :src="product.image_url" 
                    class="w-full md:w-52 md:h-52 object-cover rounded-lg mb-1 aspect-square"
                >
            </div>
            <div>
                <p class="mb-3 font-semibold text-lg">{{ product.name }}</p>
                <p class="mb-3 font-bold text-xl">Rp{{ product.price_formated }}</p>
                <OutlineOrange class="!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mb-4 !cursor-default">
                    Komisi: {{ product.commission }}%
                </OutlineOrange>
                <p class="mb-2 text-xs text-neutral-dark-gray">Deskripsi Toko</p>
                <p class="text-sm font-medium">{{ product.description }}</p>
            </div>
        </div>

        <div class="flex gap-2 mb-4" x-data="{popup: false}">
            <Link :href="route('merchant.products.edit', product.uuid)" class="bg-blue rounded-md px-4 py-2 text-sm font-semibold text-white flex-center gap-1 my-4 w-fit">
                <i class="isax-b icon-edit-2 text-xl"></i> Ubah Produk
            </Link>

            <a class="bg-red rounded-md px-4 py-2 text-sm font-semibold text-white flex-center gap-1 my-4 w-fit cursor-pointer" x-on:click="popup=true">
                <i class="isax-b icon-trash text-xl"></i> Hapus Produk
            </a>
            <Popup>
                <Confirmation class="mx-auto mb-3" />
                <h2 class="text-center mb-2 font-semibold text-base">
                    Hapus Produk
                </h2>
                <h2 class="text-center text-xs">
                    Apakah anda yakin akan menghapus produk ini?
                </h2>
                <div class="flex-center gap-3">
                    <OutlineBlue
                        class="mt-8 h-[48px] min-w-[100px] justify-center"
                        x-on:click="popup=false"
                        v-if="!loading"
                    >
                        Batal
                    </OutlineBlue>
                    <SolidBlue
                        class="mt-8 h-[48px] min-w-[100px] justify-center"
                        @click="deleteProduct"
                        :disabled="loading"
                        :loading="loading"
                    >
                        Iya
                    </SolidBlue>
                </div>
            </Popup>
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
                        <template v-if="promotion.type == 'special-this-month'"><SpecialThisMonth /></template>
                        <template v-if="promotion.type == 'favorite-product'"><FavoriteProduct /></template>
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
                        help="Rasio foto 16:9"
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
    import { Head, Link, useForm, router } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'

    import TopAdvertisement from '@/Components/Icon/Image/TopAdvertisement.vue';
    import AdvertisementBanner from '@/Components/Icon/Image/AdvertisementBanner.vue';
    import BlastInfo from '@/Components/Icon/Image/BlastInfo.vue';
    import SpecialThisMonth from '@/Components/Icon/Image/SpecialThisMonth.vue';
    import FavoriteProduct from '@/Components/Icon/Image/FavoriteProduct.vue';

    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import Popup from '@/Components/Popup/Popup.vue';
    import { clickId } from '@/plugins/functions/global';
    import PopupBank from '@/Components/Popup/PopupBank.vue';
    import DropZoneImage from '@/Components/Input/DropZoneImage.vue';
    import MultipleLanguage from '@/Components/Input/Select/MultipleLanguage.vue';
    import Single from '@/Components/Input/Select/Single.vue';
    import Select from '@/Components/Input/Select/Index.vue'
    import LoadingButton from '@/Components/Icon/Etc/LoadingButton.vue';
    import OutlineOrange from "@/Components/Button/OutlineOrange.vue";

    import { watch, ref } from 'vue'
    import Confirmation from '@/Components/Icon/Image/Confirmation.vue';
    import axios from 'axios';

    const props = defineProps(["product", "packages", "regions", "languages"])

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
    const loading = ref(false)

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
            formOrder.post(route("merchant.order.product", props.product.id), {
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

    const deleteProduct = () => {
        loading.value = true
        useForm({}).delete(route('merchant.products.delete', props.product.id))
    }

</script>