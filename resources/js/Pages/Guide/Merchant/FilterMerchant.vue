<template>
    <section x-data="{popup: false}">
        <a x-on:click="popup=true" id="popup-filter"></a>
        <Popup title="Filter Merchant">
            <div class="grid grid-cols-2 gap-x-3">
                <div class="col-span-2 md:col-span-1">
                    <Single
                        v-if="regions"
                        placeholder="Pilih Provinsi"
                        label="Provinsi"
                        :data="regions"
                        id="province"
                        v-model="form.province"
                        :selected="form.province"
                        :popup="true"
                    />
                </div>
                <div class="col-span-2 md:col-span-1">
                    <Single
                        v-if="hasCity"
                        placeholder="Pilih Kabupaten"
                        label="Kabupaten/kotamadya"
                        v-bind:data="cities"
                        id="city"
                        v-model="form.city"
                        :selected="form.city"
                        :popup="true"
                    />
                </div>
                <div class="col-span-2 mb-3">
                    <MultipleCategory
                        v-if="categories"
                        label="Kategori Merchant"
                        :category="categories"
                        id="categories"
                        v-model="form.categories"
                        :selected="form.categories"
                        :popup="true"
                    />
                </div>
                <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg col-span-2 mb-4" >
                    <label for="incentives_amount_highest" class="w-full text-sm text-dark font-medium">Sort by Incentive Amount (High to Low)</label>
                    <input
                        id="incentives_amount_highest"
                        value="incentives_amount_highest"
                        name="sort"
                        type="radio"
                        class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                        v-model="form.sort"
                    />
                </div>
                <!-- <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg col-span-2 mb-4" >
                    <label for="incentives_amount_lowest" class="w-full text-sm text-dark font-medium">Sort By Incentives Amount (Lowest)</label>
                    <input
                        id="incentives_amount_lowest"
                        value="incentives_amount_lowest"
                        name="sort"
                        type="radio"
                        class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                        v-model="form.sort"
                    />
                </div> -->
                <OutlineBlue class="justify-center" :href="route('guide.merchants.index')">
                    Reset
                </OutlineBlue>
                <SolidBlue
                    class="justify-center font-semibold"
                    x-on:click="popup=false"
                    @click="filterData"
                >
                    Terapkan
                </SolidBlue>

                <a id="close-filter" x-on:click="popup=false" hidden></a>
            </div>
        </Popup>
    </section>
</template>

<script setup lang="ts">
    import Popup from '@/Components/Popup/Popup.vue';
    import Select from '@/Components/Input/Select/Index.vue';
    import MultipleCategory from '@/Components/Input/Select/MultipleCategory.vue';
    import Single from '@/Components/Input/Select/Single.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import { useForm } from '@inertiajs/vue3';
    import { clickId, getAllQueryParameter, removeAllUrlParameter, routeAppendParam } from '@/plugins/functions/global';
    import { watch, ref, onBeforeMount } from 'vue'
    
    const props = defineProps(["categories", "regions"])

    const form = useForm({
        province: '',
        city: '',
        categories: [],
        sort: '',
    })

    const hasCity = ref(true)
    const cities = ref([])

    const filterData = () => {
        const param = form;
        
        var filterParam: any = {}
        
        param.categories.forEach((origin, index) => {
            filterParam[`filter[categories][${index}]`] = origin;
        });
        filterParam['filter[province]'] = param.province
        filterParam['filter[city]'] = param.city
        filterParam['filter[sort]'] = param.sort

        removeAllUrlParameter();
        routeAppendParam(filterParam, false);
        clickId("close-filter");
    };

    watch(
    () => form.province,
    (oldValue, newValue) => {
        hasCity.value = false
        setCities()
    });

    const setCities = () => {
        props.regions.filter((row: any) => {
            if (row.id == form.province) {
                let city = form.city
                cities.value = row.cities
                form.city = ''
                cities.value.map((subrow: any) => {
                    if (subrow.id == city) {
                        form.city = city
                    }
                })

                setTimeout(() => {
                    hasCity.value = true
                }, 100)
            }
        })
    }

    onBeforeMount(() => {
        let query = getAllQueryParameter()

        form.city = query["filter[city]"] || ''
        form.sort = query["filter[sort]"] || ''
        form.province = query["filter[province]"] || ''

        const categories: any = [];

        for (const key in query) {
            if (key.startsWith("filter[categories][")) {
                const index = key.match(/\[(\d+)\]/);
                if (index) {
                    // Menggunakan parseInt untuk mengonversi indeks menjadi angka
                    const categoryValue = parseInt(query[key], 10);
                    categories.push(categoryValue);
                }
            }
        }

        form.categories = Array.from(new Set(categories));

        setCities()
    })
</script>