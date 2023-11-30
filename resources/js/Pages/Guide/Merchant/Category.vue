<template>
    <AuthLayout :hide-nav="true">
        <Head :title="title" />
        <HeaderDetail :backUrl="route('guide.home')" :title="title" />

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
            <CardMerchant />
        </div>

        <Pagination />

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import CardMerchant from '@/Components/Card/CardMerchant.vue'
    import Pagination from '@/Components/Others/Pagination.vue';

    defineProps(["title"])


</script>