<template>
    <AuthLayout :hide-nav="true">
        <Head title="Ubah Profile" />
        <HeaderDetail :backUrl="route('guide.profile.detail')" title="Ubah Profile" />

        <div class="flex-center gap-7 mb-10">
            <img
                :src="user.profile" alt=""
                class="w-32 h-32 object-cover rounded-full mb-1"
            >
        </div>

        <form @submit.prevent="submit" >
            <Input
                label="Nama lengkap (sesuai KTP)"
                type="text"
                placeholder="Input Nama lengkap (sesuai KTP)"
                id="idcard_name"
                name="idcard_name"
                :value="form.idcard_name"
                v-model="form.idcard_name"
                :error="form.errors.idcard_name"
                disabled
            />
            <Input
                label="Nama Panggilan"
                type="text"
                placeholder="Input Nama Panggilan"
                id="name"
                name="name"
                :value="form.name"
                v-model="form.name"
                :error="form.errors.name"
            />
            <Input
                label="Tanggal Lahir"
                type="text"
                placeholder="Input Tanggal Lahir"
                id="date_of_birth"
                name="date_of_birth"
                :value="form.date_of_birth"
                v-model="form.date_of_birth"
                :error="form.errors.date_of_birth"
                disabled
            />
            <InputNumber
                label="Nomor WA"
                type="text"
                placeholder="Input Nomor WA contoh: 6281...."
                id="phone"
                name="phone"
                :value="form.phone_number"
                v-model="form.phone_number"
                :error="form.errors.phone_number"
                disabled
            />
            <div class="mb-2">
                <label
                    class="text-[12px] text-dark mb-1 block"
                >
                    Profesi
                </label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3">
                    <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg" v-for="profession in professions" :key="profession.id">
                        <label :for="profession.id" class="w-full text-sm font-medium text-dark">{{ profession.name }}</label>
                        <input
                            :id="profession.id"
                            :value="profession.id"
                            name="profession"
                            type="radio"
                            class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                            v-model="form.profession"
                        />
                    </div>
                </div>
                <small v-if="form.errors.profession" class="mt-[-7px] error-text mb-4 block text-[11px]">{{ form.errors.profession }}</small>
            </div>
            <MultipleLanguage
                label="Bahasa"
                :category="languages"
                id="languages"
                v-model="form.languages"
                :selected="form.languages"
                :error="form.errors.languages"
            />
            <SolidBlue class="w-full flex-center mt-8"
                type="submit"
                :disabled="
                    !form.idcard_name ||
                    !form.name ||
                    !form.date_of_birth ||
                    !form.phone_number ||
                    !form.profession ||
                    !form.languages.length ||
                    form.processing
                "
                :loading="form.processing"
            >
                Simpan
            </SolidBlue>
        </form>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'

    import Input from '@/Components/Input/Index.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import MultipleLanguage from '@/Components/Input/Select/MultipleLanguage.vue';
    import InputRadio from '@/Components/Input/InputRadio.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';

    const props = defineProps(["languages", "professions"])
    const user = usePage().props.auth.guide

    const form = useForm({
        idcard_name: user.name,
        name: user.nick_name,
        date_of_birth: user.birthday_formated,
        phone_number: user.phone_number,
        image: null,
        profession: user.profession_id,
        languages: Array.from(new Set(user.languages)),
    })

    const submit = () => {
        if (!form.processing) {
            form.post(route('guide.profile.edit'), {
                onSuccess: () => {
                    
                }
            })
        }
    }

</script>