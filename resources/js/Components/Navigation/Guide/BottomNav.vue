<template>
    <div class="-ms-5 md:-ms-10 fixed bottom-0 z-[2] m-0 flex w-full max-w-screen-sm list-none text-center align-middle overflow-x-hidden pt-10">
        <div class="shadow-bar w-full px-5 md:px-10 py-3 pt-4 bg-white grid grid-cols-5 gap-1 justify-between">
            <template v-for="menu in menus">
                <template v-if="menu.auth_member">
                    <a href="javascript:;" class="nav-bottom" v-if="!menu.center" :class="{ active: route().current(menu.active) }" @click="subscribe(menu.route)">
                        <div class="icon">
                            <component :is="menu.icon" class="inactive"></component>
                            <component :is="menu.iconActive" class="active"></component>
                        </div>
                        <span>{{ menu.name }}</span>
                    </a>
                </template>
                <Link :href="menu.route ?? ''" class="nav-bottom" v-if="!menu.center && !menu.auth_member" :class="{ active: route().current(menu.active) }">
                    <div class="icon">
                        <component :is="menu.icon" class="inactive"></component>
                        <component :is="menu.iconActive" class="active"></component>
                    </div>
                    <span>{{ menu.name }}</span>
                </Link>
                <div v-if="menu.center && !menu.auth_member" class="flex-center relative">
                    <Link :href="menu.route ?? ''" class="nav-bottom-center">
                        <component :is="menu.icon"></component>
                    </Link>
                </div>
            </template>
        </div>
    </div>

    <PopupPlanGuide />
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
    import { Link, router, usePage } from '@inertiajs/vue3';
    import PopupPlanGuide from '@/Components/Popup/PopupPlanGuide.vue'
    import { clickId } from '@/plugins/functions/global'

    const menus = ref([
        {
            name: 'Beranda',
            route: route('guide.home'),
            active: "guide.home",
            icon: shallowRef(Home),
            iconActive: shallowRef(HomeActive),
            center: false,
            auth_member: false
        },
        {
            name: 'Merchant',
            route: route('guide.merchants.index'),
            active: "guide.merchants.index",
            icon: shallowRef(Merchant),
            iconActive: shallowRef(MerchantActive),
            center: false,
            auth_member: true
        },
        {
            name: '',
            route: route('guide.qrcode.index'),
            active: "",
            icon: shallowRef(QrCode),
            iconActive: shallowRef(QrCode),
            center: true,
            auth_member: false
        },
        {
            name: 'Pesan',
            route: route('guide.inbox.merchant'),
            active: "guide.inbox.*",
            icon: shallowRef(Message),
            iconActive: shallowRef(MessageActive),
            center: false,
            auth_member: false,
        },
        {
            name: 'Profil',
            route: route('guide.profile.index'),
            active: "guide.profile.index",
            icon: shallowRef(Profile),
            iconActive: shallowRef(ProfileActive),
            center: false,
            auth_member: false,
        }
    ])

    const subscribe = (route: any) => {
        if (!usePage().props.auth.guide.is_member) {
            clickId('popup-plan-guide')
        } else {
            router.visit(route)
        }
    }
</script>