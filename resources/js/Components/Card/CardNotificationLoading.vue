<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex gap-2 animate-pulse mb-4" v-bind:class="class" v-for="i in 4">
        <div class="h-12 w-24 bg-gray-200 rounded-2xl "></div>
        <div class="flex flex-col items-start justify-start gap-2 w-full">
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