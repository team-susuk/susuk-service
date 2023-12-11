<template>
    <Head title="Pesan" />
    <AuthLayout>
        <HeaderBlue title="Pesan" />
        <TabMenu active="merchant" />

        <div v-for="i in 10" class="mt-4">
            <CardInboxMerchant class="mb-3" @action="() => clickId('popup-booking')" />
            <CardInboxProduct class="mb-3" />
        </div>

        <Pagination />

        <PopupBooking />
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
    import PopupBooking from '@/Components/Popup/PopupBooking.vue';
    import { clickId } from '@/plugins/functions/global';

</script>