<template>
    <Head title="Welcome" />
    <section class="py-7 px-10 bg-welcome min-h-[475px]">
        <Logo />
        <h1 class="text-dark text-2xl font-bold text-center max-w-xs mx-auto mt-14">
            Selamat Datang Kembali Di aplikasi Susuk 👋
        </h1>
        <ButtonOutline border-color="blue" text-color="blue" bg-color="transparent" class="w-full flex-center mt-14 gap-3" :href="route('guide.login')">
            <UserGuide /> Login Guide
        </ButtonOutline>
        <ButtonOutline border-color="blue" text-color="blue" bg-color="transparent" class="w-full flex-center mt-6 gap-3" :href="route('merchant.login')">
            <UserMerchant /> Login Merchant
        </ButtonOutline>
    </section>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import Logo from '@/Components/Icon/Etc/LogoLg.vue';
    import ButtonOutline from '@/Components/Button/OutlineBlue.vue';
    import UserMerchant from '@/Components/Icon/Etc/UserMerchant.vue';
    import UserGuide from '@/Components/Icon/Etc/UserGuide.vue';
</script>