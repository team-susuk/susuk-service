<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex flex-col gap-2" v-bind:class="class">
        <img
            :src="data?.profile_url ?? ($page.props.asset+data.profile)" 
            class="w-full h-24 object-cover rounded-lg"
        >
        <div class="flex items-start justify-start gap-2">
            <div>
                <MerchantFill />
            </div>
            <p class="mb-0 font-semibold text-xs text-blue-2 whitespace-pre-wrap">{{ data.name }}</p>
        </div>
        <p class="mb-0 text-xxs text-neutral-gray-2 line-clamp-2 whitespace-pre-wrap">{{ data.full_address }}</p>
        <p class="mb-1 text-xs text-orange whitespace-pre-wrap font-semibold">Komisi: {{ data.full_commission }}</p>
        <SolidBlue
            :href="route('guide.merchants.detail', {
                id: data.uuid,
                _query: {
                    back_url
                }
            })"
            class="!font-semibold !text-xs md:!text-sm !px-4 !py-2 justify-center"
        >
            Lihat Merchant
        </SolidBlue>
    </div>
</template>

<script setup lang="ts">
    import SolidBlue from "../Button/SolidBlue.vue";
    import MerchantFill from "../Icon/Etc/MerchantFill.vue";

    defineProps<{
        data: any;
        class?: any;
        back_url?: any
    }>()

</script>