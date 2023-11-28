<template>
    <Head title="Beranda" />
    <AuthLayout>
        <HeaderBlue title="Merchant" />
        <h2
            class="font-bold text-lg mb-3"
        >List Semua Merchant</h2>
        <div class="grid grid-cols-2 gap-4">
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
        </div>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'

    import CardMerchant from '@/Components/Card/CardMerchant.vue'
    import HeaderBlue from '@/Components/Navigation/Guide/HeaderBlue.vue'

</script>