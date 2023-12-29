<template>
    <Head title="Qr Code" />
    <AuthLayout>
        <HeaderBlue title="Qr Code" />
        <TabMenu active="history-booking" />
        <WithPaginate :paginate="paginate" :loading="shallowReactive(CardQrCodeLoading)">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                <template v-for="merchant in paginate.data.value">
                    <CardQrCode
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
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';
    import CardQrCode from '@/Components/Card/CardQrCode.vue';
    import CardQrCodeLoading from '@/Components/Card/CardQrCodeLoading.vue';
    import { usePaginate } from '@/hooks/pagination';
    import WithPaginate from '@/Components/Others/WithPaginate.vue';
    import { shallowReactive } from 'vue';


    const paginate = usePaginate({
        route: route('guide.qrcode.histories.booking-data')
    })

</script>