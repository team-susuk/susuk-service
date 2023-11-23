<template>
    <label
        :for="id"
        class="text-[12px] text-dark mb-1 block"
    >
        {{ label }}
        <span class="text-red" v-if="$attrs.required">*</span>
    </label>
    <div
        class="relative mb-2"
        x-data="{ show: false }"
        v-bind:class="error ? 'has-error' : ''"
    >
        <i
            v-bind:class="icon"
            class="absolute top-[11px] left-4 text-[18px] text-dark"
            v-if="icon"
        ></i>
        <input
            v-bind:type="show ? 'text' : 'password'"
            v-bind="$attrs"
            v-bind:class="icon ? 'ps-12' : ''"
            @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)"
            class="bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray"
        />
        <i
            class="isax absolute cursor-pointer top-[14px] right-4 text-[14px]"
            v-bind:class="show ? 'icon-eye-slash' : 'icon-eye'"
            @click="show = !show"
        ></i>

        <small
            v-if="error"
            class="mt-[-7px] error-text mb-4 block text-[11px]"
            >{{ error }}</small
        >
        <small class="block mt-[-7px] text-[10px] mb-2" v-if="help">{{
            help
        }}</small>
    </div>
</template>

<script lang="ts" setup>
import { ref } from "vue";
defineProps<{
    label?: string;
    icon?: string;
    help?: string;
    error?: string;
    id?: string;
}>();

const show = ref(false);
</script>
