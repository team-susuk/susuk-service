<template>
    <Head title="Login" />
    <section class="">
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
            Kamu Login Sebagai Guide
        </h1>
        <p class="text-dark text-sm font-medium mt-3 text-center">
            Perjalananmu baru dimulai di sini rasakan pengalamannya
        </p>
        <form class="mt-10 w-full flex flex-col">
            <InputNumber
                label="Nomor WA"
                type="text"
                placeholder="Input Nomor WA contoh: 6281...."
                id="phone"
                name="phone"
                v-model=form.phone_number
            />
            <Password
                label="Password"
                placeholder="Input Password"
                id="password"
                name="password"
                v-model="form.password"
            />
            <Link :href="route('guide.login')" class="text-sm font-medium text-neutral-dark-gray text-end">
                Lupa Password?
            </Link>
            <ButtonSolidBlue
                bg-color="blue" text-color="white" class="w-full flex-center mt-8"
                :disabled="!form.phone_number || !form.password"
            >
                Masuk
            </ButtonSolidBlue>
            <p class="text-sm font-medium text-neutral-dark-gray text-center mt-6">
                Belum punya akun? <Link :href="route('guide.register')" class="text-blue font-semibold">Registrasi sekarang</Link>
            </p>
        </form>
    </section>
</template>

<script setup lang="ts">
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import Logo from '@/Components/Icon/Etc/Logo.vue';
    import ButtonOutline from '@/Components/Button/Outline.vue';
    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import Password from '@/Components/Input/Password.vue';

    const form = useForm({
        phone_number: '',
        password: ''
    })
</script>