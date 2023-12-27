<template>
    <Head title="Register" />
    <section class="" x-data="{popup: false}">
        <div class="flex items-center justify-between">
            <ButtonOutline
                :href="route('merchant.login')"
                border-color="silver"
                text-color="graphite"
                bg-color="transparent"
                icon="isax icon-arrow-left-2 !text-xl"
                class="!py-1 !px-2"></ButtonOutline>
            <Logo />
        </div>
        <h1 class="text-dark text-2xl font-bold text-center max-w-xs mx-auto mt-14">
            Daftarkan akun kamu sekarang ✨
        </h1>
        <p class="text-dark text-sm font-medium mt-3 text-center">
            Promosikan toko kamu kepada semua member guide
        </p>
        <form class="mt-10 w-full flex flex-col" enctype="multipart/form-data" @submit.prevent="submit">
            <Input
                label="Nama Toko"
                type="text"
                placeholder="Input Nama Toko"
                id="name"
                name="name"
                v-model="form.name"
                :error="form.errors.name"
            />
            <DropZone
                label="Upload Foto Toko"
                id="dropzone_image"
                name="image"
                v-model="form.image"
                :error="form.errors.image"
            />
            <Textarea
                label="Deskripsi Toko"
                placeholder="Input Deskripsi Toko"
                id="message"
                name="message"
                v-model="form.description"
                rows="5"
                maxlength="1000"
                :error="form.errors.description"
            />
            <Single
                v-if="categories"
                placeholder="Pilih Kategori"
                label="Kategori Merchant"
                v-bind:data="categories"
                id="category"
                v-model="form.category"
                :selected="form.category"
                :error="form.errors.category"
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
                        :selected="form.city"
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
                        :selected="form.subdistrict"
                        :error="form.errors.subdistrict"
                    />
                </div>
            </div>
            <Input
                label="Alamat Lengkap Toko"
                type="text"
                placeholder="Input Alamat Lengkap Toko"
                id="address"
                name="address"
                v-model="form.address"
                :error="form.errors.address"
            />
            <Input
                label="Nama PIC"
                type="text"
                placeholder="Input Nama PIC"
                id="pic_name"
                name="pic_name"
                v-model="form.pic_name"
                :error="form.errors.pic_name"
            />
            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <InputNumber
                        label="No Telepon Toko"
                        type="text"
                        placeholder="Input No Telepon Toko contoh: 6281...."
                        id="pic_phone"
                        name="pic_phone"
                        v-model="form.pic_phone"
                        :error="form.errors.pic_phone"
                    />
                </div>
                <div>
                    <InputNumber
                        label="No WA (Login)"
                        type="text"
                        placeholder="Input No WA contoh: 6281...."
                        id="pic_phone_wa"
                        name="pic_phone_wa"
                        v-model="form.pic_phone_wa"
                        :error="form.errors.pic_phone_wa"
                    />
                </div>
            </div>
            <section>
                <label
                    for="start_commission_range"
                    class="text-[12px] text-dark mb-1 block"
                >
                    Range Komisi (%)
                </label>
                <div class="grid grid-cols-2 gap-x-4">
                    <div>
                        <InputNumber
                            label=""
                            type="text"
                            placeholder="Input Range Komisi"
                            id="start_commission_range"
                            name="start_commission_range"
                            v-model="form.start_commission_range"
                            icon="isax icon-percentage-circle"
                            :error="form.errors.start_commission_range"
                        />
                    </div>
                    <InputNumber
                        label=""
                        type="text"
                        placeholder="Input Range Komisi"
                        id="start_commission_range"
                        name="start_commission_range"
                        v-model="form.end_commission_range"
                        icon="isax icon-percentage-circle"
                        :error="form.errors.end_commission_range"
                    />
                </div>
            </section>
            <MultipleSelect
                label="Weekdays"
                placeholder="Tambah Hari"
                :options="weekdays"
                id="weekdays"
                icon="isax icon-add"
                v-model="form.weekdays"
                :error="form.errors.weekdays"
            />
            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <TimePicker
                        label="Waktu Buka Weekdays"
                        name="open_time_weekdays"
                        v-model="form.open_time_weekdays"
                        :error="form.errors.open_time_weekdays"
                    />
                </div>
                <div>
                    <TimePicker
                        label="Waktu Tutup Weekdays"
                        name="close_time_weekdays"
                        v-model="form.close_time_weekdays"
                        :error="form.errors.close_time_weekdays"
                    />
                </div>
            </div>
            <MultipleSelect
                label="Weekends"
                placeholder="Tambah Hari"
                :options="weekends"
                id="weekends"
                icon="isax icon-add"
                v-model="form.weekends"
                :error="form.errors.weekends"
            />
            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <TimePicker
                        label="Waktu Buka Weekends"
                        name="open_time_weekends"
                        v-model="form.open_time_weekends"
                        :error="form.errors.open_time_weekdays"
                    />
                </div>
                <div>
                    <TimePicker
                        label="Waktu Tutup Weekends"
                        name="close_time_weekends"
                        v-model="form.close_time_weekends"
                        :error="form.errors.close_time_weekdays"
                    />
                </div>
            </div>
            <DropZoneFile
                label="Upload Ijin Usaha (opsional)"
                id="dropzone_document"
                name="document"
                v-model="form.document"
                :error="form.errors.document"
            />
            <Password
                label="Password (minimal 6 digit)"
                placeholder="Input Password"
                id="password"
                name="password"
                v-model="form.password"
                :error="form.errors.password"
            />
            <Password
                label="Konfirmasi Password"
                placeholder="Input Ulang Password"
                id="password_confirmation"
                name="password_confirmation"
                v-model="form.password_confirmation"
                :error="form.errors.password_confirmation"
            />
            <ButtonSolidBlue
                type="submit"
                bg-color="blue" text-color="white" class="w-full flex-center mt-8"
                :disabled="
                    !form.name ||
                    !form.image ||
                    !form.description ||
                    !form.category ||
                    !form.province ||
                    !form.city ||
                    !form.subdistrict ||
                    !form.address ||
                    !form.pic_name ||
                    !form.pic_phone ||
                    !form.pic_phone_wa ||
                    !form.start_commission_range ||
                    !form.end_commission_range ||
                    !form.weekdays.length ||
                    !form.open_time_weekdays ||
                    !form.close_time_weekdays ||
                    !form.weekends.length ||
                    !form.open_time_weekends ||
                    !form.close_time_weekends ||
                    !form.password ||
                    !form.password_confirmation ||
                    form.processing
                "
                :loading="form.processing"
            >
                Registrasi
            </ButtonSolidBlue>
            <p class="text-sm font-medium text-neutral-dark-gray text-center mt-6">
                Sudah punya akun? <Link :href="route('merchant.login')" class="text-blue font-semibold">Login</Link>
            </p>
        </form>

        <a x-on:click="popup=true" id="open-popup"></a>
        <PopupSuccess :close="true" title="Registrasi Berhasil" @action="toLogin" />
    </section>
</template>

<script setup lang="ts">
    import { Head, Link, router, useForm } from '@inertiajs/vue3';
    import Logo from '@/Components/Icon/Etc/Logo.vue';
    import ButtonOutline from '@/Components/Button/Outline.vue';
    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import Input from '@/Components/Input/Index.vue';
    import DropZone from '@/Components/Input/DropZoneImage.vue';
    import Password from '@/Components/Input/Password.vue';
    import Textarea from '@/Components/Input/Textarea.vue';
    import PopupSuccess from '@/Components/Popup/PopupSuccess.vue';
    import { clickId } from '@/plugins/functions/global';
    import Select from '@/Components/Input/Select/Index.vue'
    import MultipleSelect from '@/Components/Input/Select/MultipleSelect.vue';
    import { weekdays, weekends } from '@/plugins/etc/days'
    import TimePicker from '@/Components/Input/TimePicker.vue';
    import DropZoneFile from '@/Components/Input/DropZoneFile.vue';
    import Single from '@/Components/Input/Select/Single.vue';
    import { ref } from 'vue';
    import { watch } from 'vue';

    const props = defineProps(["categories", "regions"])

    const hasCity = ref(true)
    const hasSubDistrict = ref(true)
    const cities = ref([])
    const subdistricts = ref([])

    const form = useForm({
        name: '',
        image: null,
        description: '',
        category: '',
        province: '',
        city: '',
        subdistrict: '',
        address: '',
        pic_name: '',
        pic_phone: '',
        pic_phone_wa: '',
        start_commission_range: 0,
        end_commission_range: 0,
        weekdays: [],
        open_time_weekdays: '',
        close_time_weekdays: '',
        weekends: [],
        open_time_weekends: '',
        close_time_weekends: '',
        document: null,
        password: '',
        password_confirmation: '',
    })

    const toLogin = () => {
        router.visit(route('merchant.login'))
    }

    const submit = () => {
        if (!form.processing) {
            form.post(route('merchant.register.store'), {
                onSuccess: () => {
                    clickId("open-popup")
                },
                onError: (res: any) => {
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
</script>