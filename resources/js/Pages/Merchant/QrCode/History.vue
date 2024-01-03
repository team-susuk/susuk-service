<template>
    <Head title="Scan QR" />
    <AuthLayout>
        <HeaderBlue title="Scan QR" />
        <TabMenu active="history" />
        <WithPaginate :paginate="paginate" :loading="shallowReactive(CardQrCodeLoading)">
            <div class="grid grid-cols-1 gap-4 mt-8">
                <template v-for="merchant in paginate.data.value">
                    <CardQrCodeMerchant
                        v-if="paginate && !paginate?.loading.value"
                        :data="merchant"
                    />
                </template>
            </div>
        </WithPaginate>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';
    import CardQrCodeMerchant from '@/Components/Card/CardQrCodeMerchant.vue';
    import { usePaginate } from '@/hooks/pagination';
    import { shallowReactive } from 'vue';
    import CardQrCodeLoading from '@/Components/Card/CardQrCodeLoading.vue';
    import WithPaginate from '@/Components/Others/WithPaginate.vue';

    const paginate = usePaginate({
        route: route('merchant.qrcode.histories-data')
    })

</script>