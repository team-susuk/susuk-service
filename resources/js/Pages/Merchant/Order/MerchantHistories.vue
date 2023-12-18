<template>
    <AuthLayout :hide-nav="true">
        <Head title="Histori Pembayaran Promosi" />
        <HeaderDetail :backUrl="route('merchant.home')" title="Histori Pembayaran Promosi" />

        <WithPaginate :paginate="paginate" :loading="shallowReactive(CardOrderHistoryLoading)">
            <div class="grid grid-cols-2 gap-4">
                <template v-for="history in paginate.data.value">
                    <CardOrderHistory :data="history" />
                </template>
            </div>
        </WithPaginate>
    </AuthLayout>

</template>

<script setup lang="ts">
    import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import { usePaginate } from '@/hooks/pagination';
    import { shallowReactive } from 'vue';
    import CardOrderHistory from '@/Components/Card/CardOrderHistory.vue';
    import CardOrderHistoryLoading from '@/Components/Card/CardOrderHistoryLoading.vue';
    import WithPaginate from '@/Components/Others/WithPaginate.vue';

    const paginate = usePaginate({
        route: route('merchant.order.merchant.histories-data')
    })

</script>