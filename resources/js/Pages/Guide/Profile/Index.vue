<template>
    <Head title="Profile" />
    <AuthLayout>
        <HeaderBlue title="Profile" />

        <div class="flex-center flex-col gap-3 mb-4">
            <img
            src="https://images.unsplash.com/photo-1698849469142-6c828cfdfd95?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                class="w-32 h-32 object-cover rounded-full mb-1"
            >
            <p class="text-sm font-medium">Brooklyn Simmons</p>
            <div class="flex-center gap-1">
                <Job />
                <p class="text-xs font-medium">Brooklyn Simmons</p>
            </div>
        </div>

        <Link href="''" class="flex items-center justify-between text-sm font-medium py-3 border-b border-silver">
            Lihat Profil
            <i class="isax icon-arrow-right-3 text-xl"></i>
        </Link>
        <a class="flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer">
            Ubah Password
            <i class="isax icon-arrow-right-3 text-xl"></i>
        </a>

        <section class="mt-10">
            <div class="flex items-center gap-2 mb-6">
                <Suggestion />
                <p class="text-sm font-semibold">Saran / keluhan</p>
            </div>
            <Input
                label="Judul"
                type="text"
                placeholder="Input Judul"
                id="title"
                name="title"
                v-model="form.title"
            />
            <Textarea
                label="Pesan"
                placeholder="Input Pesan"
                id="message"
                name="message"
                v-model="form.message"
                rows="5"
                maxlength="1000"
            />
            <ButtonSolidBlue
                :disabled="!form.title || !form.message"
                class="mt-6 min-w-[100px] justify-center"
            >
                Kirim
            </ButtonSolidBlue>
        </section>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import Job from '@/Components/Icon/Etc/Job.vue'
    import Suggestion from '@/Components/Icon/Etc/Suggestion.vue'
    import Input from '@/Components/Input/Index.vue';
    import Textarea from '@/Components/Input/Textarea.vue';
    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';
    

    const form = useForm({
        title: '',
        message: ''
    })

</script>