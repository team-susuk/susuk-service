<template>
    <Head title="Profile" />
    <AuthLayout>
        <HeaderBlue title="Profile" />

        <div class="flex-center flex-col gap-3 mb-4">
            <img
            src="https://images.unsplash.com/photo-1698849469142-6c828cfdfd95?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                class="w-auto h-36 object-cover rounded-xl mb-1 aspect-video"
            >
            <div class="flex-center gap-1">
                <MerchantFill />
                <p class="text-sm font-medium">Toko Krisna Bali</p>
            </div>
        </div>

        <a class="flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer" @click="clickId('click-change')">
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

        <section x-data="{popup: false}">
            <a x-on:click="popup=!popup" id="click-change"></a>
            <Popup :close="true">
                <form class="">
                    <ChangePassword class="mx-auto mb-3" />
                    <h2 class="text-center mb-8 font-semibold text-base">
                        Ubah Password
                    </h2>
                    <Password
                        label="Password Lama"
                        placeholder="Input Password Lama"
                        id="forgot_name"
                        name="forgot_name"
                        v-model="formChange.password"
                    />

                    <Password
                        label="Password Baru (minimal 6 digit)"
                        placeholder="Input Password Baru"
                        id="forgot_name"
                        name="forgot_name"
                        v-model="formChange.new_password"
                    />

                    <Password
                        label="Konfirmasi Password Baru"
                        placeholder="Input Konfirmasi Password Baru"
                        id="forgot_name"
                        name="forgot_name"
                        v-model="formChange.new_password_confirmation"
                    />

                    <ButtonSolidBlue
                        :disabled="!formChange.password || !formChange.new_password || !formChange.new_password_confirmation"
                        class="mx-auto mt-6 min-w-[200px] justify-center"
                        @click="submitChange"
                    >
                        Simpan
                    </ButtonSolidBlue>
                </form>
            </Popup>
        </section>

        <div x-data="{popup: false}">
            <a x-on:click="popup=true" id="open-popup"></a>
            <PopupSuccess :close="true" title="Password Berhasil di Ubah" />
        </div>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import Suggestion from '@/Components/Icon/Etc/Suggestion.vue'
    import Input from '@/Components/Input/Index.vue';
    import Password from '@/Components/Input/Password.vue';
    
    import Textarea from '@/Components/Input/Textarea.vue';
    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';
    import { clickId } from '@/plugins/functions/global';
    import Popup from '@/Components/Popup/Popup.vue';
    import PopupSuccess from '@/Components/Popup/PopupSuccess.vue';
    import ChangePassword from '@/Components/Icon/Image/ChangePassword.vue'
    import MerchantFill from '@/Components/Icon/Etc/MerchantFill.vue';

    const form = useForm({
        title: '',
        message: ''
    })

    const formChange = useForm({
        password: '',
        new_password: '',
        new_password_confirmation: '',
    })

    const submitChange = () => {
        clickId('click-change')
        clickId('open-popup')
    }

</script>