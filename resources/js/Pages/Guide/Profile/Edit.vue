<template>
    <AuthLayout :hide-nav="true">
        <Head title="Ubah Profile" />
        <HeaderDetail :backUrl="route('guide.profile.detail')" title="Ubah Profile" />

        <div class="flex-center gap-7 mb-10">
            <img
                :src="user.profile" alt=""
                class="w-32 h-32 object-cover rounded-full mb-1"
            >
        </div>

        <form @submit.prevent="submit" >
            <Input
                label="Nama lengkap (sesuai KTP)"
                type="text"
                placeholder="Input Nama lengkap (sesuai KTP)"
                id="idcard_name"
                name="idcard_name"
                :value="form.idcard_name"
                v-model="form.idcard_name"
                :error="form.errors.idcard_name"
                disabled
            />
            <Input
                label="Nama Panggilan"
                type="text"
                placeholder="Input Nama Panggilan"
                id="name"
                name="name"
                :value="form.name"
                v-model="form.name"
                :error="form.errors.name"
            />
            <Input
                label="Tanggal Lahir"
                type="text"
                placeholder="Input Tanggal Lahir"
                id="date_of_birth"
                name="date_of_birth"
                :value="form.date_of_birth"
                v-model="form.date_of_birth"
                :error="form.errors.date_of_birth"
                disabled
            />
            <InputNumber
                label="Nomor WA"
                type="text"
                placeholder="Input Nomor WA contoh: 6281...."
                id="phone"
                name="phone"
                :value="form.phone_number"
                v-model="form.phone_number"
                :error="form.errors.phone_number"
                disabled
            />
            <Single
                v-if="regions"
                placeholder="Pilih Provinsi"
                label="Provinsi"
                :data="regions"
                id="province"
                v-model="form.province"
                :selected="form.province"
                :error="form.errors.province"
            />
            <div class="grid grid-cols-2 gap-x-4 mb-2">
                <div>
                    <Single
                        v-if="hasCity"
                        placeholder="Pilih Kabupaten"
                        label="Kabupaten/kotamadya"
                        v-bind:data="cities"
                        id="city"
                        v-model="form.city"
                        v-bind:selected="form.city"
                        :error="form.errors.city"
                    />
                </div>
                <div>
                    <Single
                        v-if="hasSubDistrict"
                        placeholder="Pilih Kecamatan"
                        label="Kecamatan"
                        v-bind:data="subdistricts"
                        id="subdistrict"
                        v-model="form.subdistrict"
                        v-bind:selected="form.subdistrict"
                        :error="form.errors.subdistrict"
                    />
                </div>
            </div>
            <div class="mb-2">
                <label
                    class="text-[12px] text-dark mb-1 block"
                >
                    Profesi
                </label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3">
                    <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg" v-for="profession in professions" :key="profession.id">
                        <label :for="profession.id" class="w-full text-sm font-medium text-dark">{{ profession.name }}</label>
                        <input
                            :id="profession.id"
                            :value="profession.id"
                            name="profession"
                            type="radio"
                            class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                            v-model="form.profession"
                        />
                    </div>
                </div>
                <small v-if="form.errors.profession" class="mt-[-7px] error-text mb-4 block text-[11px]">{{ form.errors.profession }}</small>
            </div>
            <MultipleLanguage
                label="Bahasa"
                :category="languages"
                id="languages"
                v-model="form.languages"
                :selected="form.languages"
                :error="form.errors.languages"
            />
            <SolidBlue class="w-full flex-center mt-8"
                type="submit"
                :disabled="
                    !form.idcard_name ||
                    !form.name ||
                    !form.date_of_birth ||
                    !form.phone_number ||
                    !form.profession ||
                    !form.languages.length ||
                    form.processing
                "
                :loading="form.processing"
            >
                Simpan
            </SolidBlue>
        </form>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'

    import Input from '@/Components/Input/Index.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import MultipleLanguage from '@/Components/Input/Select/MultipleLanguage.vue';
    import InputRadio from '@/Components/Input/InputRadio.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import Single from '@/Components/Input/Select/Single.vue';
    import { ref, watch } from 'vue';
import { onMounted } from 'vue';

    const props = defineProps(["languages", "professions", "regions"])
    const user = usePage().props.auth.guide
    
    const hasCity = ref(true)
    const hasSubDistrict = ref(true)
    const cities = ref([])
    const subdistricts = ref([])

    const form = useForm({
        idcard_name: user.name,
        name: user.nick_name,
        date_of_birth: user.birthday_formated,
        phone_number: user.phone_number,
        image: null,
        profession: user.profession_id,
        languages: Array.from(new Set(user.languages)),
        province: user.province_id,
        city: user.city_id,
        subdistrict: user.subdistrict_id,
    })

    const submit = () => {
        if (!form.processing) {
            form.post(route('guide.profile.edit'), {
                onSuccess: () => {
                    
                }
            })
        }
    }

    watch(
    () => form.province,
    (oldValue, newValue) => {
        setCities()
    });

    const setCities = () => {
        hasCity.value = false
        props.regions.filter((row: any) => {
            let city = form.city
            form.city = ''
            if (row.id == form.province) {
                cities.value = row.cities
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

    watch(
    () => form.city,
    (oldValue, newValue) => {
        setSubCities()
    });

    const setSubCities = () => {
        hasSubDistrict.value = false
        subdistricts.value = []
        props.regions.filter((row: any) => {
            if (row.id == form.province) {
                cities.value.map((subrow: any) => {
                    let subdistrict = form.subdistrict
                    form.subdistrict = ''
                    if (subrow.id == form.city) {
                        subdistricts.value = subrow.subdistricts
                        subdistricts.value.map((subcity: any) => {
                            if (subcity.id == subdistrict) {
                                form.subdistrict = subdistrict
                            }
                        })

                    }
                    setTimeout(() => {
                        hasSubDistrict.value = true
                    }, 100)

                })
            }
        })
    }

    onMounted(() => {
        getDefaultRegions()
    })


    const getDefaultRegions = () => {
        hasCity.value = false
        hasSubDistrict.value = false
        subdistricts.value = []

        props.regions.filter((row: any) => {
            let city = user.city_id
            if (row.id == user.province_id) {
                cities.value = row.cities
                cities.value.map((subrow: any) => {
                    if (subrow.id == city) {
                        form.city = city
                        let subdistrict = user.subdistrict_id
                        subdistricts.value = subrow.subdistricts
                        subdistricts.value.map((subcity: any) => {
                            if (subcity.id == subdistrict) {
                                form.subdistrict = subdistrict
                            }
                        })
                    }
                })

                setTimeout(() => {
                    hasCity.value = true
                    hasSubDistrict.value = true
                }, 100)
            }
        })

    }

</script>