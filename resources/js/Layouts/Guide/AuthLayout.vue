<template>
    <section class="min-h-full pb-24">
        <BottomNav />
        <slot />
    </section>
</template>

<script setup lang="ts">
    import BottomNav from '@/Components/Navigation/Guide/BottomNav.vue'
    import { onMounted } from 'vue';

    onMounted(() => {
        document.querySelector("body main #app")?.classList.add("min-h-[100vh]")
    })
</script>