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

    <div class="grid grid-cols-2 gap-4" v-if="paginate?.loading.value">
        <template v-if="loading">
            <component :is="loading" v-for="i in 4"></component>
        </template>
        <template v-if="!loading">
            <CardMerchantLoading v-for="i in 4" />
        </template>
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