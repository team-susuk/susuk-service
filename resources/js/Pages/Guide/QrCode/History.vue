<template>
    <Head title="Beranda" />
    <AuthLayout>
        <HeaderBlue title="Qr Code" />
        <TabMenu active="history" />
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/Guide/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';

</script>