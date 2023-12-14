<template>
    <Head title="Qr Code" />
    <AuthLayout>
        <HeaderBlue title="Qr Code" />
        <TabMenu active="qrcode" />

        <div class="flex items-center flex-col gap-4 text-center max-w-md mx-auto mt-8">
            <p class="font-semibold">
                QR Code Kamu
            </p>
            <img :src="'https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl='+$page.props.auth.guide.qrcode_id" alt="" class="w-full">
            <p class="font-medium text-sm">
                Tunjukan QR Code ini kepada toko untuk konfirmasi kedatangan membawa tamu
            </p>
        </div>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';

</script>