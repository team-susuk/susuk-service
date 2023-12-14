<template>
    <Head title="Pesan" />
    <AuthLayout>
        <HeaderBlue title="Pesan" />
        <TabMenu active="merchant" />

        <WithPaginate
            :paginate="paginate"
            :loading="shallowReactive(CardNotificationLoading)"
        >
            <div v-for="inbox in paginate.data.value" class="mt-4">
                <template
                    v-if="inbox.data?.type == 'merchant'"
                >
                    <CardInboxMerchant
                        class="mb-3"
                        :data="inbox.data"
                        :time="inbox.time"
                        @action="actionBooking(inbox.merchant_id)"
                    />
                </template>
                <template
                    v-if="inbox.data?.type == 'product'"
                >
                    <CardInboxProduct
                        :data="inbox.data"
                        :time="inbox.time"
                        class="mb-3"
                        @action="actionBooking(inbox.merchant_id)"
                    />
                </template>
            </div>
        </WithPaginate>

        <PopupBooking
            v-if="showBooking"
            :id="idMerchant"
        />
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';

    import CardNotificationLoading from '@/Components/Card/CardNotificationLoading.vue'
    import CardInboxMerchant from '@/Components/Card/CardInboxMerchant.vue';
    import CardInboxProduct from '@/Components/Card/CardInboxProduct.vue';
    import PopupBooking from '@/Components/Popup/PopupBooking.vue';
    import { clickId } from '@/plugins/functions/global';
    import WithPaginate from '@/Components/Others/WithPaginate.vue';
    import { usePaginate } from '@/hooks/pagination';
    import { shallowReactive, ref } from 'vue';

    const paginate = usePaginate({
        route: route("guide.inbox.merchant-data")
    })

    const showBooking = ref(true)
    const idMerchant = ref("")

    const actionBooking = (id: string) => {
        idMerchant.value = id
        showBooking.value = false

        setTimeout(() => {
            showBooking.value = true
            setTimeout(() => {
                clickId('popup-booking')
            }, 10)
        }, 100)
    }

</script>