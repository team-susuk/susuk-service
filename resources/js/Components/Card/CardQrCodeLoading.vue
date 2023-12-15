<template>
    <div class="grid grid-cols-2 gap-4">
        <div class="rounded-[14px] border border-silver p-3 flex flex-col gap-3 animate-pulse" v-bind:class="class" v-for="i in 4">
            <div class="flex gap-2 pb-3 border-b border-[#F2F6FE]">
                <div class="w-[85.33px] h-12 object-cover rounded-lg aspect-video bg-gray-200">
                </div>
                <div class="flex flex-col gap-1 ">
                    <div class="h-3 mb-2 w-20 bg-gray-200 rounded-2xl"></div>
                    <div class="h-3 mb-2 w-20 bg-gray-200 rounded-2xl"></div>
                    <div class="h-3 w-20 bg-gray-200 rounded-2xl"></div>
                </div>
            </div>
            <div class="flex gap-8">
                <div class="flex-center gap-2">
                    <div>
                        <div class="h-8 w-8 bg-gray-200 rounded-2xl"></div>
                    </div>
                    <span class="font-medium text-sm">
                        <div class="h-5 w-10 bg-gray-200 rounded-2xl"></div>
                    </span>
                </div>
                <div class="flex-center gap-2">
                    <div>
                        <div class="h-8 w-8 bg-gray-200 rounded-2xl"></div>
                    </div>
                    <span class="font-medium text-sm">
                        <div class="h-5 w-10 bg-gray-200 rounded-2xl"></div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    defineProps<{
        class?: any
    }>()

</script>