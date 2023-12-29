<template>
    <div class="grid grid-cols-1 gap-4">
        <div class="rounded-[14px] border border-silver p-[14px] flex flex-col gap-2 animate-pulse mb-4" v-bind:class="class" v-for="i in 4">
            <div class="pb-3 border-b border-silver">
                <div class="grid grid-cols-2 gap-2 justify-between">
                    <div class="">
                        <div class="bg-silver rounded-2xl text-xxs w-16 h-5 text-neutral-dark-gray mb-[6px]"></div>
                        <div class="bg-silver rounded-2xl text-sm w-16 h-5 font-semibold"></div>
                    </div>
                    <div
                        class="bg-silver ms-auto rounded-full px-3 py-1 text-xs font-medium border w-16 h-5"
                    >
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <div class="grid grid-cols-2 gap-2 justify-between">
                    <div class="">
                        <div class="bg-silver rounded-2xl text-xxs text-neutral-dark-gray mb-[6px] w-16 h-5"></div>
                        <div class="bg-silver rounded-2xl text-sm font-semibold w-16 h-5"></div>
                    </div>
                    <div class="ms-auto">
                        <div class="bg-silver rounded-2xl text-xxs text-neutral-dark-gray mb-[6px] w-16 h-5"></div>
                        <div class="bg-silver rounded-2xl text-sm font-semibold w-16 h-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    defineProps<{
        data: any;
    }>()

</script>