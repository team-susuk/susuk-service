<template>
    <Head title="Register" />
    <section class="" x-data="{popup: false}">
        <div class="flex items-center justify-between">
            <ButtonOutline
                :href="route('guide.login')"
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
            Jadilah orang pertama yang mengetahui promo menarik 
        </p>
        <form class="mt-10 w-full flex flex-col" @submit.prevent="submit" enctype="multipart/form-data">
            <Input
                label="Nama lengkap (sesuai KTP)"
                type="text"
                placeholder="Input Nama lengkap (sesuai KTP)"
                id="idcard_name"
                name="idcard_name"
                v-model="form.idcard_name"
                :error="form.errors.idcard_name"
            />
            <Input
                label="Nama Panggilan"
                type="text"
                placeholder="Input Nama Panggilan"
                id="name"
                name="name"
                v-model="form.name"
                :error="form.errors.name"
            />
            <DatePicker
                label="Tanggal Lahir"
                name="date_of_birth"
                maxDate="2008-01-01"
                v-model="form.date_of_birth"
                :error="form.errors.date_of_birth"
            />
            <InputNumber
                label="Nomor WA"
                type="text"
                placeholder="Input Nomor WA contoh: 6281...."
                id="phone"
                name="phone"
                v-model="form.phone_number"
                :error="form.errors.phone_number"
            />
            <DropZone
                label="Upload Foto Profil"
                id="dropzone_image"
                name="image"
                v-model="form.image"
                :error="form.errors.image"
            />
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
                :error="form.errors.languages"
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
                    !form.idcard_name ||
                    !form.name ||
                    !form.date_of_birth ||
                    !form.phone_number ||
                    !form.image ||
                    !form.profession ||
                    !form.languages.length ||
                    !form.password ||
                    !form.password_confirmation ||
                    form.processing
                "
                :loading="form.processing"
            >
                Registrasi
            </ButtonSolidBlue>
            <p class="text-sm font-medium text-neutral-dark-gray text-center mt-6">
                Sudah punya akun? <Link :href="route('guide.login')" class="text-blue font-semibold">Login</Link>
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
    import DatePicker from '@/Components/Input/DatePicker.vue';
    import Input from '@/Components/Input/Index.vue';
    import DropZone from '@/Components/Input/DropZoneImage.vue';
    import Password from '@/Components/Input/Password.vue';
    import InputRadio from '@/Components/Input/InputRadio.vue';
    import MultipleLanguage from '@/Components/Input/Select/MultipleLanguage.vue';
    import PopupSuccess from '@/Components/Popup/PopupSuccess.vue';
    import { onMounted } from 'vue'
    import { clickId, showAlert } from '@/plugins/functions/global';

    const props = defineProps(["languages", "professions"])


    const form = useForm({
        idcard_name: '',
        name: '',
        date_of_birth: '',
        phone_number: '',
        image: null,
        profession: '',
        languages: [],
        password: '',
        password_confirmation: '',
    })

    const toLogin = () => {
        router.visit(route('guide.login'))
    }

    const submit = () => {
        if (!form.processing) {
            form.post(route('guide.register.store'), {
                onSuccess: () => {
                    clickId("open-popup")
                },
                onError: (res: any) => {
                }
            })
        }
        
    }
</script>