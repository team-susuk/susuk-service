<template>
    <template
        v-if="
            !paginate?.loading.value &&
            !paginate?.data?.value?.length &&
            paginate
        ">
        
        <div class="flex-center w-full py-5">
            <EmptyState />
        </div>
    </template>
    <slot v-if="!paginate?.loading.value" />

    <template v-if="loading && paginate?.loading.value">
        <component :is="loading"></component>
    </template>
    <div class="grid grid-cols-2 gap-4" v-if="!loading && paginate?.loading.value">
        <CardMerchantLoading v-for="i in 4" />
    </div>

    <Pagination
        :information="paginate.information.value"
        @next="paginate.next()"
        @prev="paginate.prev()"
        @goToPage="paginate.goToPage"
    />
</template>

<script setup lang="ts">
    import EmptyState from '../Icon/Image/EmptyState.vue';
    import CardMerchantLoading from '@/Components/Card/CardMerchantLoading.vue'
    import Pagination from '@/Components/Others/Pagination.vue';

    defineProps<{
        paginate: any;
        loading?: any;
    }>();

</script>