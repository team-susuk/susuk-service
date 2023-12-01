<template>
    <section x-data="{popup: true}">
        <a x-on:click="popup=true" id="popup-booking"></a>
        <Popup title="Reservasi">
            <DatePicker
                label="Tanggal kedatangan"
                name="arrival_date"
                v-model="form.arrival_date"
            />
            <TimePicker
                label="Jam kedatangan"
                name="arrival_time"
                v-model="form.arrival_time"
            />
            <InputNumber
                label="Jumlah Tamu"
                type="text"
                placeholder="Input Jumlah Tamu"
                id="total_guest"
                name="total_guest"
                v-model="form.total_guest"
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
                    />
                </div>
                <OutlineBlue class="justify-center mt-2" x-on:click="popup=false">
                    Kembali
                </OutlineBlue>
                <SolidBlue class="justify-center mt-2 font-semibold" x-on:click="popup=false">
                    Reservasi
                </SolidBlue>
            </div>
        </Popup>
    </section>
</template>

<script setup lang="ts">
    import { useForm } from "@inertiajs/vue3";
    import OutlineBlue from "../Button/OutlineBlue.vue";
    import SolidBlue from "../Button/SolidBlue.vue";
    import DatePicker from "../Input/DatePicker.vue";
    import TimePicker from "../Input/TimePicker.vue";
    import InputNumber from "../Input/InputNumber.vue";
    import Popup from "./Popup.vue";

    const form = useForm({
        type: 'lokal',
        total_guest: 0,
        arrival_time: '',
        arrival_date: '',
    })
</script>