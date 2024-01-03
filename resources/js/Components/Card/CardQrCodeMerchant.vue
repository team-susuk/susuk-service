<template>
    <div class="rounded-[14px] border border-silver p-3 flex flex-col gap-3" v-bind:class="class">
        <div class="flex gap-2 pb-3 border-b border-[#F2F6FE]">
            <div>
                <img
                    :src="data.user.profile_url" 
                    class="w-12 h-12 object-cover rounded-full aspect-square"
                >
            </div>
            <div class="flex flex-col gap-1 flex-auto">
                <div class="flex items-center justify-between w-full">
                    <p class="text-xxs text-neutral-gray-2 font-medium">
                        {{ data.user.code }}
                    </p>
                    <!-- <p class="text-xxs text-neutral-gray-2 font-medium text-end">
                        Kedatangan {{ data.time_arrival }}
                    </p> -->
                </div>
                <p class="text-sm font-semibold">
                    {{ data.user.name }}
                </p>
                <p class="text-xxs">
                    {{ data.city }}, {{ data.province }}
                </p>
                <p class="text-xxs text-neutral-gray-2 font-medium flex items-center gap-2 mt-2">
                    <Booking /> Dibooking {{ data.time_arrival }}
                </p>
                <p class="text-xxs text-neutral-gray-2 font-medium flex items-center gap-2" v-if="data.confirm_at">
                    <Scan /> Discan {{ data.confirm_at }}
                </p>
            </div>
        </div>
        <div class="flex gap-8 items-center">
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
    import Booking from "../Icon/Etc/Booking.vue";
    import Scan from "../Icon/Etc/Scan.vue";

    defineProps<{
        class?: any,
        data: any
    }>()

</script>