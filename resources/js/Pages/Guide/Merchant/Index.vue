<template>
    <Head title="Merchant" />
    <AuthLayout>
        <HeaderBlue title="Merchant" />
        <div class="flex items-center justify-between mb-3">
            <h2
                class="font-bold text-lg"
            >List Semua Merchant</h2>
            <a
                class="border border-neutral-gray-2 text-neutral-gray-2 rounded-full text-sm font-semibold px-3 py-2 cursor-pointer"
                @click="() => clickId('popup-filter')"
            >
                <i class="isax icon-sort"></i>
                Filter
            </a>
        </div>
        

        <WithPaginate :paginate="paginate">
            <div class="grid grid-cols-2 gap-4">
                <template v-for="merchant in paginate.data.value">
                    <CardMerchant
                        v-if="paginate && !paginate?.loading.value"
                        :data="merchant"
                        :back_url="route('guide.merchants.index')+backUrl()"
                    />
                </template>
            </div>
        </WithPaginate>

    </AuthLayout>


    <FilterMerchant
        :categories="categories"
        :regions="regions"
    />
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'

    import CardMerchant from '@/Components/Card/CardMerchant.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import { clickId, getAllQueryParameter } from '@/plugins/functions/global';

    import { usePaginate } from '@/hooks/pagination';

    import FilterMerchant from './FilterMerchant.vue'
    import WithPaginate from '@/Components/Others/WithPaginate.vue';

    defineProps(["categories", "regions"])

    const paginate = usePaginate({
        route: route('guide.merchants.index-data')
    })

    const backUrl = () => {
        return "?" + new URL(window.location.href).search.substring(1);
    }

</script>