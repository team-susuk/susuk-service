<template>
    <Head title="Beranda" />
    <AuthLayout>
        <HeaderBlue title="Qr Code" />
        <TabMenu active="qrcode" />

        <div class="flex items-center flex-col gap-4 text-center max-w-md mx-auto mt-8">
            <p class="font-semibold">
                QR Code Kamu
            </p>
            <img src="https://cdn.britannica.com/17/155017-050-9AC96FC8/Example-QR-code.jpg" alt="" class="w-full">
            <p class="font-medium text-sm">
                Tunjukan QR Code ini kepada toko untuk konfirmasi kedatangan membawa tamu
            </p>
        </div>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/Guide/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';

</script>