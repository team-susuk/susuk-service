<template>
    <div class="h-14 fixed top-0 flex items-center justify-center bg-white z-10 left-0 right-0 max-w-screen-sm mx-auto shadow-navbar">
        <Link :href="backUrl" class="absolute left-5 md:left-10" v-if="backUrl">
            <i class="isax icon-arrow-left text-xl"></i>
        </Link>
        <h1 class="font-semibold text-sm uppercase">
            {{ title }}
        </h1>
    </div>
    <div class="h-14 "></div>
</template>

<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';
    defineProps<{
        title: string,
        backUrl?: any
    }>()
</script>