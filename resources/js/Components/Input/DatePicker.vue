<template>
    <div>
        <label
            class="text-[12px] text-dark mb-1 block"
            v-if="label"
        >
            {{ label }}
            <span class="text-red" v-if="$attrs.required">*</span>
        </label>

        <div
            class="relative mb-2"
            x-data="{input: $el.getAttribute('data-value')}"
            :data-value="$attrs.value || ''"
            v-bind:class="{ 'has-error': error }"
        >
            <input
                type="text"
                x-model="input"
                v-bind="$attrs"
                v-bind:class="name"
                placeholder="yyyy-mm-dd"
                class="bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray"
            />
            <i
                class="isax icon-calendar-2 absolute right-4 top-3 pointer-events-none"
            ></i>
            <small
                v-if="error"
                class="mt-[-7px] error-text mb-4 block text-[11px]"
                >{{ error }}</small
            >
        </div>
    </div>
</template>
<script setup lang="ts">
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
import { ref, onMounted, watch } from "vue";
const props = defineProps<{
    name: string;
    default?: string;
    label?: string;
    error?: string;
    min?: string;
    maxDate?: string;
}>();
const emit = defineEmits(["update:modelValue"]);
const datePicker: any = ref(null);
onMounted(() => {
    datePicker.value = flatpickr(`.${props.name}`, {
        dateFormat: "Y-m-d",
        time_24hr: true,
        maxDate: props.maxDate ?? '',
        minDate: props.min ?? '',
        defaultDate: props.default,
        onChange: (selectedDates, dateStr) => {
            emit("update:modelValue", dateStr);
        },
    });
    emit("update:modelValue", props.default);
});
watch(
    () => props.min,
    (min, value) => {
        datePicker.value.set("minDate", props.min);
    }
);

watch(
    () => props.default,
    (min, value) => {
        datePicker.value.set("defaultDate", props.default);
    }
)
</script>
