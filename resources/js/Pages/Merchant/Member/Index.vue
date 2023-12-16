<template>
    <Head title="Total Member" />
    <AuthLayout>
        <HeaderBlue title="Total Member" />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
            <div
                v-for="user in users"
                :key="user.name"
                class="shadow-card rounded-lg bg-white p-3 flex gap-3"
            >
                <div>
                    <component :is="user.icon"></component>
                </div>
                <div>
                    <p class="text-lg md:text-xl font-semibold">
                        {{
                            user.name == 'Guide' ?
                            guideTotal
                            : (
                                user.name == 'Driver' ?
                                driverTotal :
                                freelanceTotal
                            )
                        }}
                    </p>
                    <p class="text-sm text-neutral-gray-3">
                        {{ user.name }}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between mb-3">
            <h2
                class="font-bold text-lg"
            >List Member</h2>
            <a
                class="border border-neutral-gray-2 text-neutral-gray-2 rounded-full text-sm font-semibold px-3 py-2 cursor-pointer"
                @click="() => clickId('popup-filter')"
            >
                <i class="isax icon-sort"></i>
                Filter
            </a>
        </div>

        <div
            class="overflow-auto border-none "
        >
            <table class="border-collapse table-auto w-full text-xs">
                <thead>
                    <tr>
                        <Th>Nama</Th>
                        <Th>Profesi</Th>
                        <Th>Provinsi</Th>
                        <Th>Kabupaten/Kotamadya</Th>
                        <Th>Bahasa</Th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="i in 10">
                        <Td>Jane Cooper</Td>
                        <Td>Guide</Td>
                        <Td>Semarang</Td>
                        <Td>Banyumanik</Td>
                        <Td>Korea, Inggris, Indonesia</Td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- <Pagination /> -->
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
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import Pagination from '@/Components/Others/Pagination.vue';

    import ImageGuide from '@/Components/Icon/Image/Guide.vue'
    import ImageDriver from '@/Components/Icon/Image/Driver.vue'
    import ImageFreelance from '@/Components/Icon/Image/Freelance.vue'
    import { ref, shallowRef } from 'vue';
    import MultipleLanguage from '@/Components/Input/Select/MultipleLanguage.vue'
    import Select from '@/Components/Input/Select/Index.vue'
    import { clickId } from '@/plugins/functions/global'
    import Popup from '@/Components/Popup/Popup.vue'
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import Th from '@/Components/Table/Th.vue';
    import Td from '@/Components/Table/Td.vue';

    const props = defineProps(["languages"])

    const guideTotal = ref(120)
    const driverTotal = ref(100)
    const freelanceTotal = ref(20)

    const form = useForm({
        province: '',
        city: '',
        profession: 'guide',
        languages: []
    })

    const users = ref([
        {
            icon: shallowRef(ImageGuide),
            name: "Guide"
        },
        {
            icon: shallowRef(ImageDriver),
            name: "Driver"
        },
        {
            icon: shallowRef(ImageFreelance),
            name: "Freelance"
        }
    ])

</script>