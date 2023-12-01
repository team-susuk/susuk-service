<template>
    <AuthLayout :hide-nav="true">
        <Head title="Ubah Profile" />
        <HeaderDetail :backUrl="route('guide.profile.detail')" title="Ubah Profile" />

        <div class="flex-center gap-7 mb-10">
            <img
            src="https://images.unsplash.com/photo-1698849469142-6c828cfdfd95?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                class="w-32 h-32 object-cover rounded-full mb-1"
            >
        </div>

        <Input
            label="Nama lengkap (sesuai KTP)"
            type="text"
            placeholder="Input Nama lengkap (sesuai KTP)"
            id="idcard_name"
            name="idcard_name"
            :value="form.idcard_name"
            v-model="form.idcard_name"
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
        />
        <Input
            label="Tanggal Lahir"
            type="text"
            placeholder="Input Tanggal Lahir"
            id="date_of_birth"
            name="date_of_birth"
            :value="form.date_of_birth"
            v-model="form.date_of_birth"
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
            disabled
        />
        <label
            class="text-[12px] text-dark mb-1 block"
        >
            Profesi
        </label>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3">
            <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg" >
                <label for="guide" class="w-full text-sm font-medium text-dark">Guide</label>
                <input
                    id="guide"
                    value="guide"
                    name="profession"
                    type="radio"
                    class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                    v-model="form.profession"
                />
            </div>
            <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg" >
                <label for="driver" class="w-full text-sm font-medium text-dark">Driver</label>
                <input
                    id="driver"
                    value="driver"
                    name="profession"
                    type="radio"
                    class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                    v-model="form.profession"
                />
            </div>
            <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg" >
                <label for="freelance" class="w-full text-sm font-medium text-dark">Freelance</label>
                <input
                    id="freelance"
                    value="freelance"
                    name="profession"
                    type="radio"
                    class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                    v-model="form.profession"
                />
            </div>
        </div>
        <MultipleLanguage
            label="Bahasa"
            :category="languages"
            id="languages"
            v-model="form.languages"
            :selected="form.languages"
        />
        <SolidBlue class="w-full flex-center mt-8"
            :disabled="
                !form.idcard_name ||
                !form.name ||
                !form.date_of_birth ||
                !form.phone_number ||
                !form.profession ||
                !form.languages.length
            "
        >
            Simpan
        </SolidBlue>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'

    import Input from '@/Components/Input/Index.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import { languages } from '@/plugins/etc/languages'
    import MultipleLanguage from '@/Components/Input/Select/MultipleLanguage.vue';
    import InputRadio from '@/Components/Input/InputRadio.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';

    const form = useForm({
        idcard_name: 'Cameron Williamson',
        name: 'Cameron',
        date_of_birth: '15 November 2023',
        phone_number: '0812345674001',
        image: null,
        profession: 'guide',
        languages: ['kn', 'ne'],
    })

</script>