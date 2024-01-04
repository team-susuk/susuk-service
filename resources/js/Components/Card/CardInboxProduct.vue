<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex gap-3 flex-col md:flex-row" v-bind:class="class">
        <img
            :src="data.product?.image" 
            class="w-36 object-cover rounded-lg h-fit"
        >
        <div class="w-full">
            <div class="flex flex-col gap-2">
                <p class="text-xs font-medium text-neutral-gray w-1/4">{{ time }}</p>
                <div class="flex items-start justify-start">
                    <div>
                        <MerchantFill class="w-5" />
                    </div>
                    <p class="mb-0 font-semibold text-sm text-blue-2 whitespace-pre-wrap">{{ data.merchant?.name }}</p>
                </div>
            </div>
            <!-- <p class="text-neutral-gray-2 text-xs my-2">
                {{ data.merchant?.address }}
            </p>
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
            </div> -->
            <div class="flex gap-2 justify-between items-center pt-2 border-t border-silver mt-2">
                <p class="text-sm font-medium">{{ data.product?.name }}</p>
                <div class="ms-auto">
                    <OutlineOrange class="!font-semibold !text-xxs !px-0 !w-24 !h-6 justify-center !rounded-full !cursor-default">
                        Komisi: {{ data.product?.commission }}
                    </OutlineOrange>
                </div>
            </div>
            <p class="text-sm font-bold">Rp{{ formatPrice(data.product?.price) }}</p>
            <div class="flex gap-3 mt-4">
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
    import MerchantFill from "@/Components/Icon/Etc/MerchantFill.vue";
    import Maps from '@/Components/Icon/Etc/Maps.vue';
    import Pic from '@/Components/Icon/Etc/Pic.vue';
    import Whatsapp from '@/Components/Icon/Etc/Whatsapp.vue';
    import OutlineOrange from '@/Components/Button/OutlineOrange.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';

    const emit = defineEmits(["action"])
    const props = defineProps(["data", "time"])

    const confirmAction = () => {
        emit("action", () => {

        });
    }

    const formatPrice = (value: any) => {
        return Number(value).toLocaleString("id-ID")
    }
</script>