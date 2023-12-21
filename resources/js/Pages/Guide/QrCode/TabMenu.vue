<template>
    <div class="flex gap-4 w-full flex-nowrap overflow-x-auto whitespace-pre">
        <Link
            v-for="menu in menus"
            :href="menu.route"
            class="w-full text-center border-b pb-2 hover:border-blue hover:text-blue transition-all text-sm font-semibold"
            :class="{
                'border-blue text-blue': menu.key === active,
                'border-neutral-gray-5 text-neutral-gray-3': menu.key !== active
            }"
        >
            {{ menu.name }}
        </Link>
    </div>
</template>

<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';
    defineProps<{
        active: string
    }>()

    const menus = [
        {
            name: 'QR Code',
            key: 'qrcode',
            route: route('guide.qrcode.index')
        },
        {
            name: 'Histori Scan',
            key: 'history-scan',
            route: route('guide.qrcode.histories.scan')
        },
        {
            name: 'Histori Booking',
            key: 'history-booking',
            route: route('guide.qrcode.histories.booking')
        }
    ]

</script>