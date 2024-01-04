<template>
    <Head title="Pesan" />
    <AuthLayout>
        <HeaderBlue title="Pesan" />
        <TabMenu active="admin" />

        <WithPaginate
            :paginate="paginate"
            :loading="shallowReactive(CardNotificationLoading)"
        >
            <div v-for="row in paginate.data.value" class="mt-4">
                <CardInboxAdmin class="mb-3" :data="row" :back_url="route('merchant.inbox.detail', row.uuid)" />
            </div>
        </WithPaginate>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';
    import CardInboxAdmin from '@/Components/Card/CardInboxAdmin.vue';
    import CardNotificationLoading from '@/Components/Card/CardNotificationLoading.vue'
    import WithPaginate from '@/Components/Others/WithPaginate.vue';
    import { usePaginate } from '@/hooks/pagination';
    import { shallowReactive } from 'vue';

    const paginate = usePaginate({
        route: route("guide.inbox.admin-data")
    })

</script>