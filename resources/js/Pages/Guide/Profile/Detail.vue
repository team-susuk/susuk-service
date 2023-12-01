<template>
    <AuthLayout :hide-nav="true">
        <Head title="Detail Profile" />
        <HeaderDetail :backUrl="route('guide.profile.index')" title="Lihat Profile" />

        <div class="flex-center gap-7 mb-10">
            <img
            src="https://images.unsplash.com/photo-1698849469142-6c828cfdfd95?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                class="w-32 h-32 object-cover rounded-full mb-1"
            >
            <OutlineBlue :href="route('guide.profile.edit')">
                Ubah Profile
            </OutlineBlue>
        </div>
        
        <div class="grid grid-cols-2 gap-2 justify-between">
            <p class="text-sm font-medium text-dark-gray">Nama Lengkap</p>
            <p class="text-base font-semibold text-end">Cameron Williamson</p>

            <p class="text-sm font-medium text-dark-gray">Nama Panggilan</p>
            <p class="text-base font-semibold text-end">Cameron</p>

            <p class="text-sm font-medium text-dark-gray">Tanggal Lahir</p>
            <p class="text-base font-semibold text-end">15 November 2023</p>

            <p class="text-sm font-medium text-dark-gray">No WA</p>
            <p class="text-base font-semibold text-end">Profesi</p>

            <p class="text-sm font-medium text-dark-gray">Nama Panggilan</p>
            <p class="text-base font-semibold text-end">Guide</p>

            <p class="text-sm font-medium text-dark-gray">Bahasa</p>
            <div class="flex items-center gap-2 justify-end flex-wrap">
                <span
                    class="px-3 items-center flex bg-neutral-light-gray text-xs h-[32px] rounded-full"
                >
                    Mandarin
                </span>
                <span
                    class="px-3 items-center flex bg-neutral-light-gray text-xs h-[32px] rounded-full"
                >
                    Jepang
                </span>
            </div>
        </div>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';


</script>