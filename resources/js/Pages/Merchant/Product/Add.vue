<template>
    <AuthLayout :hide-nav="true">
        <Head title="Tambah Produk" />
        <HeaderDetail :backUrl="route('merchant.home')" title="Tambah Produk" />

        <form class="w-full flex flex-col" enctype="multipart/form-data" @submit.prevent="submit">
            <Input
                label="Nama Produk"
                type="text"
                placeholder="Input Nama Produk"
                id="name"
                name="name"
                v-model="form.name"
                :error="form.errors.name"
            />
            <DropZone
                label="Upload Foto Produk"
                id="dropzone_image"
                name="image"
                v-model="form.image"
                :error="form.errors.image"
            />
            <Textarea
                label="Deskripsi Produk"
                placeholder="Input Deskripsi Produk"
                id="message"
                name="message"
                v-model="form.description"
                v-bind:value="form.description"
                rows="5"
                maxlength="500"
                :error="form.errors.description"
            />
            <InputNumber
                label="Komisi (%)"
                type="text"
                placeholder="Input Komisi"
                id="commission"
                name="commission"
                v-model="form.commission"
                :value="form.commission"
                icon="isax icon-percentage-circle"
                :error="form.errors.commission"
            />
            <InputNumber
                label="Harga"
                type="text"
                placeholder="Input Harga"
                id="price"
                name="price"
                v-model="form.price"
                :value="form.price"
                :error="form.errors.price"
            />
            <ButtonSolidBlue
                type="submit"
                bg-color="blue" text-color="white" class="w-full flex-center mt-8"
                :disabled="
                    !form.name ||
                    !form.image ||
                    !form.description ||
                    !form.commission ||
                    !form.price ||
                    form.processing
                "
                :loading="form.processing"
            >
                Registrasi
            </ButtonSolidBlue>
        </form>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'

    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import DropZone from '@/Components/Input/DropZoneImage.vue';
    import Textarea from '@/Components/Input/Textarea.vue';
    import Input from '@/Components/Input/Index.vue';

    const form = useForm({
        name: '',
        image: null,
        description: '',
        commission: '',
        price: '',
    })

    const submit = () => {
        if (!form.processing) {
            form.post(route('merchant.products.store'))
        }
    }

</script>