<template>
    <div class="flex w-full ">
        <Link
            v-for="menu in menus"
            :href="menu.route"
            class="w-full text-center border-b pb-2 hover:border-blue hover:text-blue transition-all text-sm font-semibold"
            :class="{
                'border-blue text-blue': menu.key === active,
                'border-neutral-gray-5 text-neutral-gray-5': menu.key !== active
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
            route: route('merchant.qrcode.index')
        },
        {
            name: 'Histori',
            key: 'history',
            route: route('merchant.qrcode.histories')
        }
    ]

</script>