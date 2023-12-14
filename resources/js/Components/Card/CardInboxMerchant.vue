<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex gap-3" v-bind:class="class">
        <img
            :src="data.merchant?.profile_url" 
            class="w-36 object-cover rounded-lg h-fit"
        >
        <div class="w-full">
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold">{{ data.merchant?.name }}</p>
                <p class="text-xs font-medium text-neutral-gray">{{ time }}</p>
            </div>
            <div class="flex justify-between my-2">
                <p class="max-w-[75%] text-neutral-gray-2 text-xs">
                    {{ data.merchant?.full_address }}
                </p>
                <div>
                    <Maps class="w-7" />
                </div>
            </div>
            <div class="flex mt-2 gap-1">
                <div class="flex gap-2">
                    <div class="flex-center gap-1">
                        <div>
                            <Pic class="w-5" />
                        </div>
                        <span class="font-medium text-xxs">
                            {{ data.merchant?.pic_name }}
                        </span>
                    </div>
                    <div class="flex-center gap-1">
                        <div>
                            <Whatsapp class="w-5" />
                        </div>
                        <span class="font-medium text-xxs">
                            {{ data.merchant?.whatsapp_number }}
                        </span>
                    </div>
                </div>

                <div class="ms-auto">
                    <OutlineOrange class="!font-semibold !text-xxs !px-0 !w-24 !h-6 justify-center !rounded-full !cursor-default">
                        Komisi: {{ data.merchant?.full_commission }}
                    </OutlineOrange>
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <OutlineBlue
                    :href="route('guide.merchants.detail', data.merchant?.uuid)"
                    class="!font-semibold !text-xs md:!text-sm !h-8 justify-center !w-fit"
                >
                    Detail
                </OutlineBlue>
                <SolidBlue
                    @click="confirmAction"
                    class="!font-semibold !text-xs md:!text-sm !h-8 justify-center !w-fit"
                >
                    Booking
                </SolidBlue>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    import Maps from '@/Components/Icon/Etc/Maps.vue';
    import Pic from '@/Components/Icon/Etc/Pic.vue';
    import Whatsapp from '@/Components/Icon/Etc/Whatsapp.vue';
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import OutlineOrange from '@/Components/Button/OutlineOrange.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';

    const emit = defineEmits(["action"])

    const props = defineProps(["data", "time"])

    const confirmAction = () => {
        emit("action", () => {

        });
    }
</script>