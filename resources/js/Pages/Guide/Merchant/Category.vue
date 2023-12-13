<template>
    <AuthLayout :hide-nav="true">
        <Head :title="title" />
        <HeaderDetail :backUrl="route('guide.home')" :title="title" />

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4" v-if="paginate?.loading.value">
            <CardMerchantLoading />
            <CardMerchantLoading />
            <CardMerchantLoading />
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <CardMerchant
                v-if="paginate && !paginate?.loading.value"
                v-for="merchant in paginate.data.value"
                :data="merchant"
            />
        </div>

        <!-- <Pagination
            :information="paginate.information.value"
            @next="paginate.next()"
            @prev="paginate.prev()"
        /> -->

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import CardMerchant from '@/Components/Card/CardMerchant.vue'
    import CardMerchantLoading from '@/Components/Card/CardMerchantLoading.vue'
    import Pagination from '@/Components/Others/Pagination.vue';
    import { usePaginate } from '@/hooks/pagination'

    const props = defineProps(["title", "id", "type"])

    const paginate = usePaginate({
        route: route('guide.merchants.category-data', {
            type: props.type,
            category: props.id
        })
    })

</script>