<template>
    <AuthLayout :hide-nav="true">
        <Head :title="title" />
        <HeaderDetail :backUrl="route('guide.home')" :title="title" />

        <section class="mb-6" v-if="merchants.length">
            <h2
                class="text-lg font-semibold mb-4"
            >
                Merchant
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <CardMerchant
                    v-for="merchant in merchants"
                    :data="merchant"
                />
            </div>
        </section>

        <section class="mb-3" v-if="products.length">
            <h2
                class="text-lg font-semibold mb-4"
            >
                Produk
            </h2>
            <div class="grid grid-cols-2 gap-4">
                <CardProduct
                    v-for="product in products"
                    :data="product"
                    :href="route('guide.merchants.detail', product.merchant_id)"
                />
            </div>
        </section>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import CardMerchant from '@/Components/Card/CardMerchant.vue'
    import CardProduct from '@/Components/Card/CardProduct.vue';
    
    const props = defineProps(["title", "merchants", "products"])

</script>