<template>
    <div class="h-14 fixed top-0 flex items-center justify-center bg-blue z-10 left-0 right-0 max-w-screen-sm mx-auto">
        <h1 class="font-semibold text-white text-sm uppercase">
            {{ title }}
        </h1>
    </div>
    <div class="h-14 "></div>
</template>

<script setup lang="ts">
    defineProps<{
        title: string
    }>()
</script>