<template>
    <form x-data="{popup: false, popup_confirmation: false}">
        <a x-on:click="popup=true" id="popup-booking"></a>
        <Popup title="Reservasi">
            <DatePicker
                label="Tanggal kedatangan"
                name="arrival_date"
                v-model="form.arrival_date"
                :error="form.errors.arrival_date"
                v-bind:default="form.arrival_date"
                :min="moment().add(1, 'days').format('YYYY-MM-DD')"
            />
            <TimePicker
                label="Jam kedatangan"
                name="arrival_time"
                v-model="form.arrival_time"
                :error="form.errors.arrival_time"
                v-bind:default="form.arrival_time"
            />
            <InputNumber
                label="Jumlah Tamu"
                type="text"
                placeholder="Input Jumlah Tamu"
                id="total_guest"
                name="total_guest"
                v-model="form.total_guest"
                :value="form.total_guest"
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
                    class="justify-center mt-2 font-semibold" x-on:click="popup=false; popup_confirmation=true;"
                    :disabled="
                        !form.arrival_date ||
                        !form.arrival_time ||
                        !form.total_guest ||
                        !form.type ||
                        form.processing
                    "
                >
                    Reservasi
                </SolidBlue>
            </div>
        </Popup>

        <div
            x-show="popup_confirmation"
            class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen px-6"
            x-cloak
        >
            <div
                x-show="popup_confirmation"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 w-full h-full bg-black bg-opacity-40"
            ></div>
            <div
                x-show="popup_confirmation"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full py-4 bg-white px-6 sm:max-w-md sm:rounded-lg max-h-screen overflow-y-auto"
                v-bind:class="class"
            >
                <Confirmation class="mx-auto mb-3" />
                <h2 class="text-center mb-2 font-semibold text-base">
                    Konfirmasi Reservasi
                </h2>
                <h2 class="text-center text-xs">
                    Apakah anda sudah yakin untuk melakukan reservasi?
                </h2>
                <div class="flex-center gap-3">
                    <OutlineBlue
                        class="mt-8 h-[48px] min-w-[100px] justify-center"
                        x-on:click="popup_confirmation=false"
                        :disabled="
                            !form.arrival_date ||
                            !form.arrival_time ||
                            !form.total_guest ||
                            !form.type ||
                            form.processing
                        "
                    >
                        Batal
                    </OutlineBlue>
                    <SolidBlue
                        class="mt-8 h-[48px] min-w-[100px] justify-center"
                        @click="submit"
                        :disabled="
                            !form.arrival_date ||
                            !form.arrival_time ||
                            !form.total_guest ||
                            !form.type ||
                            form.processing
                        "
                        :loading="form.processing"
                    >
                        Iya
                    </SolidBlue>
                </div>
            </div>
        </div>

        <a hidden id="close-booking" x-on:click="popup_confirmation=false"></a>
    </form>
</template>

<script setup lang="ts">
    import { useForm } from "@inertiajs/vue3";
    import OutlineBlue from "../Button/OutlineBlue.vue";
    import SolidBlue from "../Button/SolidBlue.vue";
    import DatePicker from "../Input/DatePicker.vue";
    import TimePicker from "../Input/TimePicker.vue";
    import InputNumber from "../Input/InputNumber.vue";
    import Popup from "./Popup.vue";
    import { clickId } from "@/plugins/functions/global";
    import Confirmation from "../Icon/Image/Confirmation.vue";
    import moment from "moment";

    const form = useForm({
        type: 'lokal',
        total_guest: 0,
        arrival_time: '',
        arrival_date: '',
    })

    const props = defineProps<{
        id?: string
    }>()

    const submit = () => {
        if (props.id) {
            form.post(route("guide.merchants.booking", props.id), {
                onSuccess: () => {
                    clickId("close-booking")
                    form.type = 'lokal'
                    form.total_guest = 0
                    form.arrival_date = ''
                    form.arrival_time = ''
                    console.log("oke")
                }
            })
        }
    }
</script>