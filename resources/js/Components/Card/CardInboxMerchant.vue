<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex gap-3" v-bind:class="class">
        <img src="https://images.unsplash.com/photo-1682695798256-28a674122872?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            class="w-36 object-cover rounded-lg h-fit"
        >
        <div class="w-full">
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold">Toko Krisna Bali</p>
                <p class="text-xs font-medium text-neutral-gray">10:00</p>
            </div>
            <div class="flex justify-between my-2">
                <p class="max-w-[75%] text-neutral-gray-2 text-xs">
                    Jl. Kutai no 20, Kel. Manguharjo, Kec. Bebekan Timur, Bali
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
                            Brooklyn Simmons
                        </span>
                    </div>
                    <div class="flex-center gap-1">
                        <div>
                            <Whatsapp class="w-5" />
                        </div>
                        <span class="font-medium text-xxs">
                            0816 4035 5618
                        </span>
                    </div>
                </div>

                <div class="ms-auto">
                    <OutlineOrange class="!font-semibold !text-xxs !px-0 !w-24 !h-6 justify-center !rounded-full !cursor-default">
                        Komisi: 15%
                    </OutlineOrange>
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <OutlineBlue
                    :href="route('guide.merchants.detail', 'random')"
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

    const confirmAction = () => {
        emit("action", () => {

        });
    }
</script>