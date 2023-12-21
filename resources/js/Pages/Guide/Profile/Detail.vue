<template>
    <AuthLayout :hide-nav="true">
        <Head title="Detail Profile" />
        <HeaderDetail :backUrl="route('guide.profile.index')" title="Lihat Profile" />

        <div class="flex-center gap-7 mb-10">
            <img
                :src="user.profile" alt=""
                class="w-32 h-32 object-cover rounded-full mb-1"
            >
            <OutlineBlue :href="route('guide.profile.edit')">
                Ubah Profile
            </OutlineBlue>
        </div>
        
        <div class="grid grid-cols-2 gap-2 justify-between">
            <p class="text-sm font-medium text-dark-gray">Nama Lengkap</p>
            <p class="text-base font-semibold text-end">{{ user.name }}</p>

            <p class="text-sm font-medium text-dark-gray">Nama Panggilan</p>
            <p class="text-base font-semibold text-end">{{ user.nick_name }}</p>

            <p class="text-sm font-medium text-dark-gray">Tanggal Lahir</p>
            <p class="text-base font-semibold text-end">{{ user.birthday_formated }}</p>

            <p class="text-sm font-medium text-dark-gray">No WA</p>
            <p class="text-base font-semibold text-end">{{ user.phone_number }}</p>

            <p class="text-sm font-medium text-dark-gray">Provinsi</p>
            <p class="text-base font-semibold text-end">{{ user.province }}</p>

            <p class="text-sm font-medium text-dark-gray">Kabupaten/kotamadya</p>
            <p class="text-base font-semibold text-end">{{ user.city }}</p>

            <p class="text-sm font-medium text-dark-gray">Kecamatan</p>
            <p class="text-base font-semibold text-end">{{ user.subdistrict }}</p>

            <p class="text-sm font-medium text-dark-gray">Profesi</p>
            <p class="text-base font-semibold text-end">{{ user.profession }}</p>

            <p class="text-sm font-medium text-dark-gray">Bahasa</p>
            <div class="flex items-center gap-2 justify-end flex-wrap">
                <span
                    class="px-3 items-center flex bg-neutral-light-gray text-xs h-[32px] rounded-full"
                    v-for="(language, i) in user.languages"
                    :key="i"
                >
                    {{ language }}
                </span>
            </div>
        </div>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';

    const user = usePage().props.auth.guide


</script>