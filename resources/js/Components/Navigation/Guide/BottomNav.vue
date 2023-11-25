<template>
    <div class="-ms-5 md:-ms-10 fixed bottom-0 z-[2] m-0 flex w-full max-w-screen-sm list-none text-center align-middle overflow-x-hidden pt-10">
        <div class="shadow-bar w-full px-5 md:px-10 py-3 pt-4 bg-white grid grid-cols-5 gap-1 justify-between">
            <template v-for="menu in menus">
                <Link :href="menu.route ?? ''" class="nav-bottom" v-if="!menu.center" :class="{ active: route().current(menu.active) }">
                    <div class="icon">
                        <component :is="menu.icon" class="inactive"></component>
                        <component :is="menu.iconActive" class="active"></component>
                    </div>
                    <span>{{ menu.name }}</span>
                </Link>
                <div v-if="menu.center" class="flex-center relative">
                    <Link :href="menu.route ?? ''" class="nav-bottom-center">
                        <component :is="menu.icon"></component>
                    </Link>
                </div>
            </template>
        </div>
    </div>
</template>

<script setup lang="ts">
    import Home from '@/Components/Icon/Guide/Nav/Home.vue'
    import HomeActive from '@/Components/Icon/Guide/Nav/HomeActive.vue'
    import Merchant from '@/Components/Icon/Guide/Nav/Merchant.vue'
    import MerchantActive from '@/Components/Icon/Guide/Nav/MerchantActive.vue'
    import Message from '@/Components/Icon/Guide/Nav/Message.vue'
    import MessageActive from '@/Components/Icon/Guide/Nav/MessageActive.vue'
    import Profile from '@/Components/Icon/Guide/Nav/Profile.vue'
    import ProfileActive from '@/Components/Icon/Guide/Nav/ProfileActive.vue'
    import QrCode from '@/Components/Icon/Guide/Nav/QrCode.vue'

    import { shallowRef, ref } from 'vue'
    import { Link } from '@inertiajs/vue3';

    const menus = ref([
        {
            name: 'Beranda',
            route: route('guide.home'),
            active: "guide.home",
            icon: shallowRef(Home),
            iconActive: shallowRef(HomeActive),
            center: false
        },
        {
            name: 'Merchant',
            route: null,
            active: "guide.merchant",
            icon: shallowRef(Merchant),
            iconActive: shallowRef(MerchantActive),
            center: false
        },
        {
            name: '',
            route: null,
            active: "",
            icon: shallowRef(QrCode),
            iconActive: shallowRef(QrCode),
            center: true
        },
        {
            name: 'Pesan',
            route: null,
            active: "guide.inbox",
            icon: shallowRef(Message),
            iconActive: shallowRef(MessageActive),
            center: false,
        },
        {
            name: 'Profil',
            route: null,
            active: "guide.profile",
            icon: shallowRef(Profile),
            iconActive: shallowRef(ProfileActive),
            center: false,
        }
    ])
</script>