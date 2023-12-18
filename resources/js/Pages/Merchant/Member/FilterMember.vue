<template>
    <section x-data="{popup: false}">
        <a x-on:click="popup=true" id="popup-filter"></a>
        <Popup title="Filter Merchant">
            <div class="grid grid-cols-2 gap-x-3">
                <div>
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
                <div>
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
                <div class="col-span-2">
                    <Select
                        label="Profesi"
                        id="profession"
                        name="profession"
                        v-model="form.profession"
                    >
                        <option value="guide">Guide</option>
                        <option value="driver">Driver</option>
                        <option value="freelance">Freelance</option>
                    </Select>
                </div>
                <div class="col-span-2 mb-3">
                    <MultipleLanguage
                        label="Bahasa "
                        :category="languages"
                        id="languages"
                        :popup="true"
                        v-model="form.languages"
                    />
                </div>
                <OutlineBlue class="justify-center" x-on:click="popup=false" id="close-filter">
                    Kembali
                </OutlineBlue>
                <SolidBlue
                    class="justify-center font-semibold" x-on:click="popup=false"
                    @click="filterData"
                >
                    Terapkan
                </SolidBlue>
            </div>
        </Popup>
    </section>
</template>

<script setup lang="ts">
    import MultipleLanguage from '@/Components/Input/Select/MultipleLanguage.vue'
    import Select from '@/Components/Input/Select/Index.vue'
    import Single from '@/Components/Input/Select/Single.vue';
    import Popup from '@/Components/Popup/Popup.vue'
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import { useForm } from '@inertiajs/vue3';
    import { ref, watch, onBeforeMount } from 'vue';
    import { clickId, getAllQueryParameter, removeAllUrlParameter, routeAppendParam } from '@/plugins/functions/global';

    const props = defineProps(["languages", "regions"])

    const form = useForm({
        province: '',
        city: '',
        profession: 'guide',
        languages: []
    })

    const hasCity = ref(true)
    const cities = ref([])

    const filterData = () => {
        const param = form;
        
        var filterParam: any = {}
        
        param.languages.forEach((origin, index) => {
            filterParam[`filter[languages][${index}]`] = origin;
        });
        filterParam['filter[province]'] = param.province
        filterParam['filter[city]'] = param.city
        filterParam['filter[profession]'] = param.profession

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
        form.profession = query["filter[profession]"] || ''
        form.province = query["filter[province]"] || ''

        const languages: any = [];

        for (const key in query) {
            if (key.startsWith("filter[languages][")) {
                const index = key.match(/\[(\d+)\]/);
                if (index) {
                    // Menggunakan parseInt untuk mengonversi indeks menjadi angka
                    const langValue = parseInt(query[key], 10);
                    languages.push(langValue);
                }
            }
        }

        form.languages = Array.from(new Set(languages));

        setCities()
    })
</script>