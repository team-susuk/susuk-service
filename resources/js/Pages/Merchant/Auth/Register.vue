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
        <form class="mt-10 w-full flex flex-col">
            <Input
                label="Nama Toko"
                type="text"
                placeholder="Input Nama Toko"
                id="name"
                name="name"
                v-model="form.name"
            />
            <DropZone
                label="Upload Foto Toko"
                id="dropzone_image"
                name="image"
                v-model="form.image"
            />
            <Textarea
                label="Deskripsi Toko"
                placeholder="Input Deskripsi Toko"
                id="message"
                name="message"
                v-model="form.description"
                rows="5"
                maxlength="1000"
            />
            <Select
                label="Kategori Toko"
                id="category"
                name="category"
                v-model="form.category"
            >
                <option value="shopping">Shopping</option>
                <option value="culinary">Culinary</option>
                <option value="leisure">Leisure</option>
                <option value="activities">Activities</option>
                <option value="others">Others</option>
            </Select>
            <Select
                label="Provinsi"
                id="province"
                name="province"
                v-model="form.province"
            >
                <option value="jawa-tengah">Jawa Tengah</option>
                <option value="jawa-barat">Jawa Barat</option>
            </Select>
            <div class="grid grid-cols-2 gap-x-4">
                <Select
                    label="Kabupaten/kotamadya"
                    id="district"
                    name="district"
                    v-model="form.district"
                >
                    <option value="jawa-tengah">Badung</option>
                    <option value="jawa-barat">Semarang</option>
                </Select>
                <Select
                    label="Kecamatan"
                    id="subdistrict"
                    name="subdistrict"
                    v-model="form.subdistrict"
                >
                    <option value="jawa-tengah">Badung</option>
                    <option value="jawa-barat">Semarang</option>
                </Select>
            </div>
            <Input
                label="Alamat Lengkap Toko"
                type="text"
                placeholder="Input Alamat Lengkap Toko"
                id="address"
                name="address"
                v-model="form.address"
            />
            <Input
                label="Nama PIC"
                type="text"
                placeholder="Input Nama PIC"
                id="pic_name"
                name="pic_name"
                v-model="form.pic_name"
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
                    />
                </div>
                <div>
                    <InputNumber
                        label="No WA"
                        type="text"
                        placeholder="Input No WA contoh: 6281...."
                        id="pic_phone_wa"
                        name="pic_phone_wa"
                        v-model="form.pic_phone_wa"
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
            />
            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <TimePicker
                        label="Waktu Buka Weekdays"
                        name="open_time_weekdays"
                        v-model="form.open_time_weekdays"
                    />
                </div>
                <div>
                    <TimePicker
                        label="Waktu Tutup Weekdays"
                        name="close_time_weekdays"
                        v-model="form.close_time_weekdays"
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
            />
            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <TimePicker
                        label="Waktu Buka Weekends"
                        name="open_time_weekends"
                        v-model="form.open_time_weekends"
                    />
                </div>
                <div>
                    <TimePicker
                        label="Waktu Tutup Weekends"
                        name="close_time_weekends"
                        v-model="form.close_time_weekends"
                    />
                </div>
            </div>
            <DropZoneFile
                label="Upload Ijin Usaha (opsional)"
                id="dropzone_document"
                name="document"
                v-model="form.document"
            />
            <Password
                label="Password (minimal 6 digit)"
                placeholder="Input Password"
                id="password"
                name="password"
                v-model="form.password"
            />
            <Password
                label="Konfirmasi Password"
                placeholder="Input Ulang Password"
                id="password_confirmation"
                name="password_confirmation"
                v-model="form.password_confirmation"
            />
            <ButtonSolidBlue
                bg-color="blue" text-color="white" class="w-full flex-center mt-8"
                @click="submit"
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


    const form = useForm({
        name: '',
        image: null,
        description: '',
        category: '',
        province: '',
        district: '',
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
        clickId('open-popup')
    }
</script>