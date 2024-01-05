<template>
    <div class="rounded-[14px] border border-silver p-[14px] items-start flex gap-3" v-bind:class="class">
        <img
            :src="data.merchant?.image" 
            class="w-14 md:w-36 object-cover rounded-lg h-fit"
        >
        <div class="w-full">
            <div class="flex justify-between gap-2">
                <p class="text-sm font-semibold w-3/4 whitespace-pre-wrap">{{ data.merchant?.name }}</p>
                <p class="text-xs font-medium text-neutral-gray min-w-max">{{ time }}</p>
            </div>
            <!-- <div class="flex justify-between my-2">
                <p class="max-w-[75%] text-neutral-gray-2 text-xs">
                    {{ data.merchant?.address }}
                </p>
                <div>
                    <Maps class="w-7" />
                </div>
            </div> -->
            <!-- <div class="flex mt-2 gap-1">
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
                        Komisi: {{ data.merchant?.commission }}
                    </OutlineOrange>
                </div>
            </div> -->
            <div class="flex gap-3 mt-4">
                <OutlineBlue
                    :href="route('guide.merchants.detail', {
                        id: data.merchant?.uuid,
                        _query: {
                            back_url: route('guide.inbox.merchant')
                        }
                    })"
                    class="!font-semibold !text-xs md:!text-sm !h-8 justify-center !w-fit"
                >
                    Lihat Merchant
                </OutlineBlue>
                <!-- <SolidBlue
                    @click="confirmAction"
                    class="!font-semibold !text-xs md:!text-sm !h-8 justify-center !w-fit"
                >
                    Booking
                </SolidBlue> -->
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