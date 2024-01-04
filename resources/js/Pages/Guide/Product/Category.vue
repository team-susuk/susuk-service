<template>
    <AuthLayout :hide-nav="true">
        <Head :title="title" />
        <HeaderDetail :backUrl="route('guide.home')" :title="title" />

        <div class="grid grid-cols-2 gap-4" v-if="paginate?.loading.value">
            <CardMerchantLoading />
            <CardMerchantLoading />
            <CardMerchantLoading />
        </div>

        <div class="grid grid-cols-2 gap-4">
            <CardProduct
                v-if="paginate && !paginate?.loading.value"
                v-for="product in paginate.data.value"
                :data="product"
                :href="route('guide.merchants.detail', product.merchant_id)"
                :back_url="route('guide.products.category', id)"
            />
        </div>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import CardProduct from '@/Components/Card/CardProduct.vue'
    import CardMerchantLoading from '@/Components/Card/CardMerchantLoading.vue';
    import { usePaginate } from '@/hooks/pagination';

    const props = defineProps(["title", "id"])

    const paginate = usePaginate({
        route: route('guide.products.category-data', {
            category: props.id
        })
    })

</script>