<template>
    <Head title="Profile" />
    <AuthLayout>
        <HeaderBlue title="Profile" />

        <div class="flex-center flex-col gap-3 mb-4">
            <img
                :src="user.profile" alt=""
                class="w-32 h-32 object-cover rounded-full mb-1"
            >
            <p class="text-sm font-medium">{{ user.nick_name }}</p>
            <div class="flex-center gap-1">
                <Job />
                <p class="text-xs font-medium">{{ user.profession }}</p>
            </div>
        </div>

        <Link :href="route('guide.profile.detail')" class="flex items-center justify-between text-sm font-medium py-3 border-b border-silver">
            Lihat Profil
            <i class="isax icon-arrow-right-3 text-xl"></i>
        </Link>
        <a class="flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer" @click="clickId('click-change')">
            Ubah Password
            <i class="isax icon-arrow-right-3 text-xl"></i>
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
            ></Textarea>
            <ButtonSolidBlue
                type="submit"
                :disabled="!form.title || !form.message || form.processing"
                :loading="form.processing"
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
                        :value="formChange.password"
                        :error="formChange.errors.password"
                    />

                    <Password
                        label="Password Baru (minimal 6 digit)"
                        placeholder="Input Password Baru"
                        id="forgot_name"
                        name="forgot_name"
                        v-model="formChange.new_password"
                        :value="formChange.new_password"
                        :error="formChange.errors.new_password"
                    />

                    <Password
                        label="Konfirmasi Password Baru"
                        placeholder="Input Konfirmasi Password Baru"
                        id="forgot_name"
                        name="forgot_name"
                        v-model="formChange.new_password_confirmation"
                        :value="formChange.new_password_confirmation"
                        :error="formChange.errors.new_password_confirmation"
                    />

                    <ButtonSolidBlue
                        type="submit"
                        :disabled="!formChange.password || !formChange.new_password || !formChange.new_password_confirmation || formChange.processing"
                        :loading="formChange.processing"
                        class="mx-auto mt-6 min-w-[200px] justify-center"
                    >
                        Simpan
                    </ButtonSolidBlue>
                </form>
            </Popup>
        </section>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import Job from '@/Components/Icon/Etc/Job.vue'
    import Suggestion from '@/Components/Icon/Etc/Suggestion.vue'
    import Input from '@/Components/Input/Index.vue';
    import Password from '@/Components/Input/Password.vue';
    
    import Textarea from '@/Components/Input/Textarea.vue';
    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';
    import { clickId } from '@/plugins/functions/global';
    import Popup from '@/Components/Popup/Popup.vue';
    import PopupSuccess from '@/Components/Popup/PopupSuccess.vue';
    import ChangePassword from '@/Components/Icon/Image/ChangePassword.vue'

    const user = usePage().props.auth.guide
    

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
        if (!formChange.processing) {
            formChange.post(route('guide.profile.change-password'), {
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
            form.post(route('guide.feedback.complaint'), {
                onSuccess: () => {
                    form.title = ""
                    form.message = ""
                }
            })
        }
    }

</script>