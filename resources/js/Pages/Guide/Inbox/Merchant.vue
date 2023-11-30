<template>
    <Head title="Pesan" />
    <AuthLayout>
        <HeaderBlue title="Pesan" />
        <TabMenu active="merchant" />

        <template v-for="i in 10">
            <CardInboxMerchant class="mb-3" />
            <CardInboxProduct class="mb-3" />
        </template>

        <Pagination />
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';

    import Pagination from '@/Components/Others/Pagination.vue';
    import CardInboxMerchant from '@/Components/Card/CardInboxMerchant.vue';
    import CardInboxProduct from '@/Components/Card/CardInboxProduct.vue';

</script>