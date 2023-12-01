<template>
    <AuthLayout :hide-nav="true">
        <Head :title="title" />
        <HeaderDetail :backUrl="route('guide.home')" :title="title" />

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <CardProduct :href="route('guide.merchants.detail', 'random')" />
            <CardProduct :href="route('guide.merchants.detail', 'random')" />
            <CardProduct :href="route('guide.merchants.detail', 'random')" />
            <CardProduct :href="route('guide.merchants.detail', 'random')" />
            <CardProduct :href="route('guide.merchants.detail', 'random')" />
            <CardProduct :href="route('guide.merchants.detail', 'random')" />
        </div>

        <Pagination />

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import CardProduct from '@/Components/Card/CardProduct.vue'
    import Pagination from '@/Components/Others/Pagination.vue';

    defineProps(["title"])


</script>