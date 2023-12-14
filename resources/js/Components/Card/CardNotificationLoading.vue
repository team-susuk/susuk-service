<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex flex-col gap-2 animate-pulse" v-bind:class="class">
        <div class="h-12 w-24 bg-gray-200 rounded-2xl "></div>
        <div class="flex items-start justify-start gap-2">
            <div class="h-5 w-full bg-gray-200 rounded-2xl">
            </div>
            <div class="h-8 w-full bg-gray-200 rounded-2xl">
            </div>
            <div class="h-8 w-full bg-gray-200 rounded-2xl">
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    defineProps<{
        class?: any
    }>()

</script>