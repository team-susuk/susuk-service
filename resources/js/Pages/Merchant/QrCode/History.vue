<template>
    <Head title="Scan QR" />
    <AuthLayout>
        <HeaderBlue title="Scan QR" />
        <TabMenu active="history" />
        <div class="mt-8 grid grid-cols-2 gap-3">
            <CardQrCodeMerchant v-for="i in 10" />
        </div>

        <Pagination />
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';
    import CardQrCodeMerchant from '@/Components/Card/CardQrCodeMerchant.vue';
    import Pagination from '@/Components/Others/Pagination.vue';

</script>