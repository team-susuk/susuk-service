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

    <PopupPlanMerchant />
</template>

<script setup lang="ts">
    import Home from '@/Components/Icon/Merchant/Nav/Home.vue'
    import HomeActive from '@/Components/Icon/Merchant/Nav/HomeActive.vue'
    import Member from '@/Components/Icon/Merchant/Nav/Member.vue'
    import MemberActive from '@/Components/Icon/Merchant/Nav/MemberActive.vue'
    import Message from '@/Components/Icon/Merchant/Nav/Message.vue'
    import MessageActive from '@/Components/Icon/Merchant/Nav/MessageActive.vue'
    import Profile from '@/Components/Icon/Merchant/Nav/Profile.vue'
    import ProfileActive from '@/Components/Icon/Merchant/Nav/ProfileActive.vue'
    import QrCode from '@/Components/Icon/Merchant/Nav/QrCode.vue'

    import { shallowRef, ref } from 'vue'
    import { Link, router, usePage } from '@inertiajs/vue3';
    import { clickId } from '@/plugins/functions/global'
    import PopupPlanMerchant from '@/Components/Popup/PopupPlanMerchant.vue'

    const menus = ref([
        {
            name: 'My Merchant',
            route: route('merchant.home'),
            active: "merchant.home",
            icon: shallowRef(Home),
            iconActive: shallowRef(HomeActive),
            center: false,
            auth_member: false
        },
        {
            name: 'Member',
            route: route('merchant.member.index'),
            active: "merchant.member.index",
            icon: shallowRef(Member),
            iconActive: shallowRef(MemberActive),
            center: false,
            auth_member: true
        },
        {
            name: '',
            route: route('merchant.qrcode.index'),
            active: "merchant.qrcode.*",
            icon: shallowRef(QrCode),
            iconActive: shallowRef(QrCode),
            center: true,
            auth_member: false
        },
        {
            name: 'Pesan',
            route: route('merchant.inbox.guide'),
            active: "merchant.inbox.*",
            icon: shallowRef(Message),
            iconActive: shallowRef(MessageActive),
            center: false,
            auth_member: false
        },
        {
            name: 'Profil',
            route: route('merchant.profile.index'),
            active: "merchant.profile.index",
            icon: shallowRef(Profile),
            iconActive: shallowRef(ProfileActive),
            center: false,
            auth_member: false
        }
    ])

    const subscribe = (route: any) => {
        if (!usePage().props.auth.merchant.is_member) {
            clickId('popup-plan-merchant')
        } else {
            router.visit(route)
        }
    }
</script>