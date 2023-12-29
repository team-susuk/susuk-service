<template>
    <AuthLayout :hide-nav="true">
        <Head title="Ubah Toko" />
        <HeaderDetail :backUrl="route('merchant.home')" title="Ubah Toko" />

        <form class="w-full flex flex-col" enctype="multipart/form-data" @submit.prevent="submit">
            <DropZone
                label="Upload Foto Toko"
                id="dropzone_image"
                name="image"
                v-model="form.image"
                :error="form.errors.image"
                :defaultImage="user.profile"
            />
            <Textarea
                label="Deskripsi Toko"
                placeholder="Input Deskripsi Toko"
                id="message"
                name="message"
                v-model="form.description"
                v-bind:value="form.description"
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
            <Input
                label="Nama PIC"
                type="text"
                placeholder="Input Nama PIC"
                id="pic_name"
                name="pic_name"
                v-model="form.pic_name"
                :value="form.pic_name"
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
                        :value="form.pic_phone"
                        :error="form.errors.pic_phone"
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
                        :value="form.pic_phone_wa"
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
                            :value="form.start_commission_range"
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
                        :value="form.end_commission_range"
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
                :selected="form.weekdays"
                :error="form.errors.weekdays"
            />
            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <TimePicker
                        label="Waktu Buka Weekdays"
                        name="open_time_weekdays"
                        v-model="form.open_time_weekdays"
                        :default="form.open_time_weekdays"
                        :value="form.open_time_weekdays"
                        :error="form.errors.open_time_weekdays"
                    />
                </div>
                <div>
                    <TimePicker
                        label="Waktu Tutup Weekdays"
                        name="close_time_weekdays"
                        v-model="form.close_time_weekdays"
                        :default="form.close_time_weekdays"
                        :value="form.close_time_weekdays"
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
                :selected="form.weekends"
                :error="form.errors.weekends"
            />
            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <TimePicker
                        label="Waktu Buka Weekends"
                        name="open_time_weekends"
                        v-model="form.open_time_weekends"
                        :default="form.open_time_weekends"
                        :value="form.open_time_weekends"
                        :error="form.errors.open_time_weekdays"
                    />
                </div>
                <div>
                    <TimePicker
                        label="Waktu Tutup Weekends"
                        name="close_time_weekends"
                        v-model="form.close_time_weekends"
                        :default="form.close_time_weekends"
                        :value="form.close_time_weekends"
                        :error="form.errors.close_time_weekdays"
                    />
                </div>
            </div>
            <ButtonSolidBlue
                type="submit"
                bg-color="blue" text-color="white" class="w-full flex-center mt-8"
                :disabled="
                    !form.description ||
                    !form.category ||
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
                    form.processing
                "
                :loading="form.processing"
            >
                Update
            </ButtonSolidBlue>
        </form>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'

    import ButtonOutline from '@/Components/Button/Outline.vue';
    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import Input from '@/Components/Input/Index.vue';
    import DropZone from '@/Components/Input/DropZoneImage.vue';
    import Textarea from '@/Components/Input/Textarea.vue';
    import MultipleSelect from '@/Components/Input/Select/MultipleSelect.vue';
    import { weekdays, weekends } from '@/plugins/etc/days'
    import TimePicker from '@/Components/Input/TimePicker.vue';
    import Single from '@/Components/Input/Select/Single.vue';

    const props = defineProps(["categories"])

    const user = usePage().props.auth.merchant

    const form = useForm({
        name: user.name,
        image: null,
        description: user.description,
        category: user.category_id,
        pic_name: user.pic_name,
        pic_phone: user.phone_number,
        pic_phone_wa: user.whatsapp_number,
        start_commission_range: user.commission.start,
        end_commission_range: user.commission.end,
        weekdays: user.weekdays || [],
        open_time_weekdays: user.weekday_time.start,
        close_time_weekdays: user.weekday_time.end,
        weekends: user.weekends || [],
        open_time_weekends: user.weekend_time.start,
        close_time_weekends: user.weekend_time.end,
    })

    const submit = () => {
        if (!form.processing) {
            form.post(route('merchant.home.edit.store'))
        }
    }

</script>