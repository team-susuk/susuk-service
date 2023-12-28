<template>
    <Head title="Login" />
    <section class="" x-data="{popup: false}">
        <div class="flex items-center justify-between">
            <ButtonOutline
                :href="route('welcome')"
                border-color="silver"
                text-color="graphite"
                bg-color="transparent"
                icon="isax icon-arrow-left-2 !text-xl"
                class="!py-1 !px-2"></ButtonOutline>
            <Logo />
        </div>
        <h1 class="text-dark text-2xl font-bold text-center max-w-xs mx-auto mt-14">
            Kamu Login Sebagai Merchant
        </h1>
        <p class="text-dark text-sm font-medium mt-3 text-center">
            Perjalananmu baru dimulai di sini rasakan pengalamannya
        </p>
        <form class="mt-10 w-full flex flex-col" @submit.prevent="submit">
            <InputNumber
                label="Nomor WA"
                type="text"
                placeholder="Input Nomor WA contoh: 6281...."
                id="phone"
                name="phone"
                v-model="form.phone_number"
                :error="form.errors.phone_number"
            />
            <Password
                label="Password"
                placeholder="Input Password"
                id="password"
                name="password"
                v-model="form.password"
                :error="form.errors.password"
            />
            <a class="text-sm font-medium text-neutral-dark-gray text-end cursor-pointer" x-on:click="popup=true">
                Lupa Password?
            </a>
            <ButtonSolidBlue
                type="submit"
                bg-color="blue" text-color="white" class="w-full flex-center mt-8"
                :disabled="!form.phone_number || !form.password || form.processing"
                :loading="form.processing"
            >
                Masuk
            </ButtonSolidBlue>
            <p class="text-sm font-medium text-neutral-dark-gray text-center mt-6">
                Belum punya akun? <Link :href="route('merchant.register')" class="text-blue font-semibold">Registrasi sekarang</Link>
            </p>
        </form>


        <a x-on:click="popup=false" id="close-forgot"></a>
        <Popup :close="true">
            <form class="" @submit.prevent="submitForgot">
                <icForgotPassword class="mx-auto mb-3" />
                <h2 class="text-center mb-8 font-semibold text-base">
                    Lupa Password
                </h2>
                <Input
                    label="Nama Lengkap"
                    type="text"
                    placeholder="Input Nama Lengkap"
                    id="forgot_name"
                    name="forgot_name"
                    v-model="formForgot.name"
                />
                <InputNumber
                    label="Nomor WA"
                    type="text"
                    placeholder="Input Nomor WA contoh: 6281...."
                    id="forgot_phone"
                    name="forgot_phone"
                    v-model="formForgot.phone_number"
                />

                <ButtonSolidBlue
                    type="submit"
                    :disabled="!formForgot.name || !formForgot.phone_number || formForgot.processing"
                    :loading="formForgot.processing"
                    class="mx-auto mt-6 min-w-[200px] justify-center"
                >
                    Submit
                </ButtonSolidBlue>
            </form>
        </Popup>
    </section>


    <div x-data="{popup: false}">
        <a x-on:click="popup=true" id="open-popup"></a>
        <PopupSuccess :close="true" title="Mohon Tunggu" sub-title="Kami akan segera mengirimkan Password baru anda" />
    </div>
</template>

<script setup lang="ts">
    import { Head, Link, router, useForm } from '@inertiajs/vue3';
    import Logo from '@/Components/Icon/Etc/Logo.vue';
    import ButtonOutline from '@/Components/Button/Outline.vue';
    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import Password from '@/Components/Input/Password.vue';
    import Input from '@/Components/Input/Index.vue';

    import Popup from '@/Components/Popup/Popup.vue';
    import PopupSuccess from '@/Components/Popup/PopupSuccess.vue';
    import icForgotPassword from '@/Components/Icon/Image/ForgotPassword.vue';
    import { clickId } from '@/plugins/functions/global';

    const form = useForm({
        phone_number: '',
        password: ''
    })

    const formForgot = useForm({
        name: '',
        phone_number: ''
    })

    const submitForgot = () => {
        if (!formForgot.processing) {
            formForgot.post(route('merchant.login.forgot-password'), {
                onSuccess: () => {
                    clickId('close-forgot')
                }
            })
        }
    }

    const submit = () => {
        if (!form.processing) {
            form.post(route('merchant.login.store'))
        }
    }
</script>