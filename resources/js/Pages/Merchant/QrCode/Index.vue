<template>
    <Head title="Scan QR" />
    <AuthLayout>
        <HeaderBlue title="Scan QR" />
        <TabMenu active="qrcode" />

        <div class="flex items-center flex-col gap-4 text-center max-w-md mx-auto mt-8">
            <StreamBarcodeReader @decode="onDecode" @loaded="onInit"></StreamBarcodeReader>
            <div class="flex flex-center flex-col gap-2" v-if="status">
                <i class="isax-b icon-warning-2 text-red text-6xl"></i>
                <p class="font-semibold text-red whitespace-pre-line">
                    {{ status }}
                </p>
            </div>
        </div>

        <section x-data="{popup: false}">
            <a x-on:click="popup=!popup" id="show-popup-edit-reservation"></a>
            <Popup title="Kedatangan">
                <form @submit.prevent="submit" v-if="form.show">
                    <DatePicker
                        label="Tanggal kedatangan"
                        name="arrival_date"
                        v-model="form.arrival_date"
                        :error="form.errors.arrival_date"
                        v-bind:default="form.arrival_date"
                        :min="moment().format('YYYY-MM-DD')"
                        v-if="dateEditable"
                    />
                    <TimePicker
                        label="Jam kedatangan"
                        name="arrival_time"
                        v-model="form.arrival_time"
                        :error="form.errors.arrival_time"
                        v-bind:default="form.arrival_time"
                        v-if="dateEditable"
                    />
                    <div class="grid grid-cols-2 gap-3" v-if="!dateEditable">
                        <div>
                            <Input
                                label="Tanggal Kedatangan"
                                type="text"
                                placeholder="Tanggal Kedatangan"
                                id="arrival_date"
                                name="arrival_date"
                                v-model="form.arrival_date"
                                v-bind:value="form.arrival_date"
                                :error="form.errors.arrival_date"
                                :disabled="true"
                            />
                        </div>
                        <div>
                            <Input
                                label="Jam Kedatangan"
                                type="text"
                                placeholder="Jam Kedatangan"
                                id="arrival_time"
                                name="arrival_time"
                                v-model="form.arrival_time"
                                v-bind:value="form.arrival_time"
                                :error="form.errors.arrival_time"
                                :disabled="true"
                            />
                        </div>
                    </div>
                    <InputNumber
                        label="Jumlah Tamu"
                        type="text"
                        placeholder="Input Jumlah Tamu"
                        id="total_guest"
                        name="total_guest"
                        v-model="form.total_guest"
                        v-bind:value="form.total_guest"
                        :error="form.errors.total_guest"
                    />
                    <label
                        class="text-[12px] text-dark mb-1 block"
                    >
                        Jenis Tamu
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg" >
                            <label for="lokal" class="w-full text-sm font-medium text-dark">Lokal</label>
                            <input
                                id="lokal"
                                value="lokal"
                                name="type"
                                type="radio"
                                class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                                v-model="form.type"
                                v-bind:checked="form.type == 'lokal' ? true : false"
                            />
                        </div>
                        <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg" >
                            <label for="asing" class="w-full text-sm font-medium text-dark">Asing</label>
                            <input
                                id="asing"
                                value="asing"
                                name="type"
                                type="radio"
                                class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                                v-model="form.type"
                                v-bind:checked="form.type == 'asing' ? true : false"
                            />
                        </div>
                        <OutlineBlue class="justify-center mt-2" x-on:click="popup=false">
                            Kembali
                        </OutlineBlue>
                        <SolidBlue
                            type="submit"
                            class="justify-center mt-2 font-semibold"
                            :disabled="
                                !form.arrival_date ||
                                !form.arrival_time ||
                                !form.total_guest ||
                                !form.type ||
                                form.processing
                            "
                            :loading="form.processing"
                        >
                            Daftar
                        </SolidBlue>
                    </div>
                </form>
            </Popup>
        </section>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';

    import { StreamBarcodeReader } from "vue-barcode-reader";
    import { ref } from 'vue';
    import Popup from '@/Components/Popup/Popup.vue';
    import InputNumber from '@/Components/Input/InputNumber.vue';
    import DatePicker from "@/Components/Input/DatePicker.vue";
    import TimePicker from "@/Components/Input/TimePicker.vue";
    import OutlineBlue from '@/Components/Button/OutlineBlue.vue';
    import SolidBlue from '@/Components/Button/SolidBlue.vue';
    import Input from '@/Components/Input/Index.vue';
    import { clickId } from '@/plugins/functions/global';
    import { onMounted } from 'vue';
    import moment from 'moment';

    const status = ref('')
    const dateEditable = ref(false)
    const formCheck = useForm({
        token: ''
    })

    const form = useForm({
        type: 'lokal',
        total_guest: 0,
        arrival_time: '',
        arrival_date: '',
        show: true,
        id: '',
        user_id: ''
    })

    const onDecode = (decodedString: any) => {
        if (!formCheck.processing) {
            form.show = false
            formCheck.token = decodedString

            formCheck.get(route('merchant.qrcode.check-qr', formCheck.token), {
                onFinish: (res: any) => {
                    let passData = usePage().props.flash.pass_data
                    if (passData) {
                        if (passData?.time || passData?.date) {
                            form.type = passData.type
                            form.total_guest = passData.guest_number
                            form.arrival_time = passData.time
                            form.arrival_date = passData.date
                            dateEditable.value = false
                        } else {
                            dateEditable.value = true
                        }

                        form.user_id = passData.user_id
                        form.show = true
                        clickId("show-popup-edit-reservation")


                    }
                }
            })
        }
    }

    const onInit = (promise: any) => {
        // promise.then(() => {
        //     status.value = ''
        // }).catch((error: any) => {
        //     status.value = 'Initialization error: ' + error + '\n Please refresh your browser'
        //     status.value = status.value.replace("NotReadableError: ", "")
        // });
    }

    const submit = () => {
        if (!form.processing) {
            form.post(route('merchant.qrcode.reservation', form.user_id), {
                onFinish: () => {
                    form.id = ''
                    form.type = ''
                    form.total_guest = 0
                    form.arrival_time = ''
                    form.arrival_date = ''

                    clickId("show-popup-edit-reservation")
                }
            })
        }
    }

    onMounted(() => {
        form.show = false
        let passData = usePage().props.flash.pass_data
        if (passData) {
            console.log(passData)
            if (passData?.time || passData?.date) {
                form.type = passData.type
                form.total_guest = passData.guest_number
                form.arrival_time = passData.time
                form.arrival_date = passData.date
                dateEditable.value = false
            } else {
                dateEditable.value = true
            }
            console.log(dateEditable.value)
            form.user_id = passData.user_id
            
            form.show = true
        }
    })

</script>