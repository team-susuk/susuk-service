<template>
    <div class="rounded-[14px] border border-silver p-3 flex flex-col gap-3" v-bind:class="class">
        <div class="flex gap-2 pb-3 border-b border-[#F2F6FE]">
            <div>
                <img
                    :src="data.merchant.profile_url" 
                    class="w-[85.33px] h-12 object-cover rounded-lg aspect-video"
                >
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-xxs text-neutral-gray-2 font-medium">
                    Kedatangan {{ data.time_arrival }}
                </p>
                <p class="text-sm font-semibold">
                    {{ data.merchant.name }}
                </p>
                <p class="text-xxs font-medium">
                    {{ data.merchant.full_address }}
                </p>

                <p class="text-xxs text-neutral-gray-2 font-medium mt-2">
                    Dibooking {{ data.created_at }}
                </p>
                <p class="text-xxs text-neutral-gray-2 font-medium" v-if="data.confirm_at">
                    Discan {{ data.confirm_at }}
                </p>
            </div>
        </div>
        <div class="flex gap-8">
            <div class="flex-center gap-2">
                <div>
                    <Guest />
                </div>
                <span class="font-medium text-sm">
                    {{ data.guest_number }}
                </span>
            </div>
            <div class="flex-center gap-2">
                <div>
                    <GlobalSearch />
                </div>
                <span class="font-medium text-sm">
                    {{ data.guest_type }}
                </span>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">

    import Guest from "../Icon/Etc/Guest.vue";
    import GlobalSearch from "../Icon/Etc/GlobalSearch.vue";

    defineProps<{
        class?: any,
        data: any
    }>()

</script>