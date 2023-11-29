<template>
    <Head title="Qr Code" />
    <AuthLayout>
        <HeaderBlue title="Qr Code" />
        <TabMenu active="history" />
        <div class="mt-8 grid grid-cols-2 gap-3">
            <CardQrCode v-for="i in 10" />
        </div>

        <Pagination />
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';
    import CardQrCode from '@/Components/Card/CardQrCode.vue';
    import Pagination from '@/Components/Others/Pagination.vue';

</script>