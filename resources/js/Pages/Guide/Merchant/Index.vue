<template>
    <Head title="Merchant" />
    <AuthLayout>
        <HeaderBlue title="Merchant" />
        <div class="flex items-center justify-between mb-3">
            <h2
                class="font-bold text-lg"
            >List Semua Merchant</h2>
            <a
                class="border border-neutral-gray-2 text-neutral-gray-2 rounded-full text-sm font-semibold px-3 py-2 cursor-pointer"
                @click="() => clickId('popup-filter')"
            >
                <i class="isax icon-sort"></i>
                Filter
            </a>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
        </div>
    </AuthLayout>

    <section x-data="{popup: false}">
        <a x-on:click="popup=true" id="popup-filter"></a>
        <Popup title="Filter Merchant">
            <div class="grid grid-cols-2 gap-x-3">
                <Select
                    label="Provinsi"
                    id="province"
                    name="province"
                    v-model="form.province"
                >
                    <option value="jawa-tengah">Jawa Tengah</option>
                    <option value="jawa-barat">Jawa Barat</option>
                </Select>
                <Select
                    label="Kabupaten/kotamadya"
                    id="city"
                    name="city"
                    v-model="form.city"
                >
                    <option value="jawa-tengah">Badung</option>
                    <option value="jawa-barat">Semarang</option>
                </Select>
                <div class="col-span-2 mb-3">
                    <MultipleCategory
                        label="Kategori Merchant"
                        :category="categories"
                        id="categories"
                        v-model="form.categories"
                    />
                </div>
                <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg col-span-2 mb-4" >
                    <label for="merchant" class="w-full text-sm font-medium text-dark">Sort By Merchant</label>
                    <input
                        id="merchant"
                        value="merchant"
                        name="sort"
                        type="radio"
                        class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                        v-model="form.sort"
                    />
                </div>
                <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg col-span-2 mb-4" >
                    <label for="incentives_amount" class="w-full text-sm font-medium text-dark">Sort By Incentives Amount</label>
                    <input
                        id="incentives_amount"
                        value="incentives_amount"
                        name="sort"
                        type="radio"
                        class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                        v-model="form.sort"
                    />
                </div>
                <OutlineBlue class="justify-center" x-on:click="popup=false">
                    Kembali
                </OutlineBlue>
                <SolidBlue class="justify-center font-semibold" x-on:click="popup=false">
                    Terapkan
                </SolidBlue>
            </div>
        </Popup>
    </section>
</template>

<script setup lang="ts">
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'

    import CardMerchant from '@/Components/Card/CardMerchant.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import Popup from '@/Components/Popup/Popup.vue';
    import Select from '@/Components/Input/Select/Index.vue';
    import { clickId } from '@/plugins/functions/global';
    import { categories } from '@/plugins/etc/example-categories'
    import MultipleCategory from '@/Components/Input/Select/MultipleCategory.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';

    const form = useForm({
        province: '',
        city: '',
        categories: [],
        sort: ''
    })

</script>