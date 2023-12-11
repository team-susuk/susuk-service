<template>
    <Head title="Pesan" />
    <AuthLayout>
        <HeaderBlue title="Pesan" />

        <div v-for="i in 3" class="mt-4">
            <CardInboxAdmin class="mb-3" />
            <CardInboxAdmin class="mb-3" type="image" />
            <CardInboxAdmin class="mb-3" type="file" />
        </div>

        <Pagination />
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import CardInboxAdmin from '@/Components/Card/CardInboxAdmin.vue';
    import Pagination from '@/Components/Others/Pagination.vue';

</script>