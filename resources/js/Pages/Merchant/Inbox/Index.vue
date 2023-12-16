<template>
    <Head title="Pesan" />
    <AuthLayout>
        <HeaderBlue title="Pesan" />

        <WithPaginate
            :paginate="paginate"
            :loading="shallowReactive(CardNotificationLoading)"
        >
            <div v-for="row in paginate.data.value" class="mt-4">
                <CardInboxAdmin class="mb-3" :data="row" />
            </div>
        </WithPaginate>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import CardInboxAdmin from '@/Components/Card/CardInboxAdmin.vue';
    import Pagination from '@/Components/Others/Pagination.vue';
    import WithPaginate from '@/Components/Others/WithPaginate.vue';
    import CardNotificationLoading from '@/Components/Card/CardNotificationLoading.vue';
    import { shallowReactive } from 'vue';
    import { usePaginate } from '@/hooks/pagination';

    const paginate = usePaginate({
        route: route("merchant.inbox.index-data")
    })

</script>