<template>
    <Head title="Profile" />
    <AuthLayout>
        <HeaderBlue title="Profile" />

        <div class="flex-center flex-col gap-3 mb-4">
            <img
                :src="$page.props.auth.merchant.profile" alt=""
                class="w-auto h-36 object-cover rounded-xl mb-1 aspect-video"
            >
            <div class="flex-center gap-1">
                <MerchantFill class="grayscale" />
                <p class="text-sm font-medium">{{ $page.props.auth.merchant.name }}</p>
            </div>
        </div>

        <a class="flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer" @click="clickId('click-change')">
            Ubah Password
            <i class="isax icon-arrow-right-3 text-xl"></i>
        </a>
        <p class="flex items-center justify-between text-sm font-medium py-3 border-b border-silver">
            Kontak Admin
            <span>{{ $page.props.bank.whatsapp }}</span>
        </p>
        <a class="flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer" @click="clickId('confirm-logout')">
            Keluar
            <Logout />
        </a>

        <form class="mt-10" @submit.prevent="submitFeedback">
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
                :value="form.title"
            />
            <Textarea
                label="Pesan"
                placeholder="Input Pesan"
                id="message"
                name="message"
                v-model="form.message"
                :value="form.message"
                rows="5"
                maxlength="1000"
            />
            <ButtonSolidBlue
                type="submit"
                :disabled="!form.title || !form.message || form.processing"
                class="mt-6 min-w-[100px] justify-center"
            >
                Kirim
            </ButtonSolidBlue>
        </form>

        <section x-data="{popup: false}">
            <a x-on:click="popup=!popup" id="click-change"></a>
            <Popup :close="true">
                <form class="" @submit.prevent="submitChange">
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
                        :error="formChange.errors.password"
                    />

                    <Password
                        label="Password Baru (minimal 6 digit)"
                        placeholder="Input Password Baru"
                        id="forgot_name"
                        name="forgot_name"
                        v-model="formChange.new_password"
                        :error="formChange.errors.new_password"
                    />

                    <Password
                        label="Konfirmasi Password Baru"
                        placeholder="Input Konfirmasi Password Baru"
                        id="forgot_name"
                        name="forgot_name"
                        v-model="formChange.new_password_confirmation"
                        :error="formChange.errors.new_password_confirmation"
                    />

                    <ButtonSolidBlue
                        type="submit"
                        :disabled="!formChange.password || !formChange.new_password || !formChange.new_password_confirmation || formChange.processing"
                        class="mx-auto mt-6 min-w-[200px] justify-center"
                    >
                        Simpan
                    </ButtonSolidBlue>
                </form>
            </Popup>
        </section>

        <section x-data="{popup: false}">
            <a x-on:click="popup=!popup" id="confirm-logout"></a>
            <Popup :close="true">
                <LogoutAlert class="mx-auto mb-3" />
                <h2 class="text-center mb-2 font-semibold text-base">
                    Apakah anda yakin ingin keluar?
                </h2>
                <div class="flex-center w-full gap-4">
                    <OutlineBlue class="justify-center mt-2 w-full" x-on:click="popup=false">
                        Batal
                    </OutlineBlue>
                    <ButtonSolidBlue
                        class="justify-center mt-2 font-semibold w-full"
                        @click="logout"
                    >
                        Keluar
                    </ButtonSolidBlue>
                </div>
            </Popup>
        </section>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, router, useForm } from '@inertiajs/vue3';
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
    import Logout from '@/Components/Icon/Etc/Logout.vue';
    import axios from 'axios';
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import LogoutAlert from '@/Components/Icon/Image/Logout.vue';

    const form = useForm({
        title: '',
        message: '',
        user_role: 'merchants'
    })

    const formChange = useForm({
        password: '',
        new_password: '',
        new_password_confirmation: '',
    })

    const submitChange = () => {
        if (!formChange.processing) {
            formChange.post(route('merchant.profile.change-password'), {
                onSuccess: () => {
                    clickId('click-change')
                    formChange.password = ''
                    formChange.new_password = ''
                    formChange.new_password_confirmation = ''
                }
            })
        }
    }

    const submitFeedback = () => {
        if (!form.processing) {
            form.post(route('merchant.feedback.complaint'), {
                onSuccess: () => {
                    form.title = ""
                    form.message = ""
                }
            })
        }
    }

    const logout = () => {
        router.post(route('merchant.logout'))
    }

</script>