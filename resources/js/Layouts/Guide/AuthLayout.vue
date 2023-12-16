<template>
    <section class="min-h-full pb-24">
        <BottomNav v-if="!hideNav" />
        <slot />
    </section>
</template>

<script setup lang="ts">
    import BottomNav from '@/Components/Navigation/Guide/BottomNav.vue'
    import { onMounted } from 'vue';

    defineProps<{
        hideNav?: boolean
    }>()
</script>