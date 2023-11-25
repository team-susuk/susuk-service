<template>
    <div 
        class="relative mb-2"
        x-data="{input: $el.getAttribute('data-value')}"
        :data-value="$attrs.value || ''"
        v-bind:class="{ 'has-error': error }"
    >
        <div class="flex items-center px-3 py-4 border border-light-gray rounded-lg" >
            <label :for="id" class="w-full text-sm font-medium text-dark" v-if="label">{{ label }}</label>
            <input
                :id="id"
                type="radio"
                v-bind="$attrs"
                x-model="input"
                @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)"
                class="w-5 h-5 text-white bg-white border-gray-600 300 focus:ring-green focus:ring-1 cursor-pointer transition-all checked:text-green"
                :checked="checked ? true : false"
            />
        </div>
        <div class="mb-4" v-if="$attrs.maxlength">
            <p class="text-[11px] text-dark float-right"><span x-text="input.length"></span>/{{ $attrs.maxlength }}</p>
        </div>
        <small v-if="error" class="mt-[-7px] error-text mb-4 block text-[11px]">{{ error }}</small>
        <small class="block mt-[-7px] text-[10px] mb-4" v-if="help">{{
            help
        }}</small>
    </div>
</template>

<script lang="ts" >
export default {
    props: [
        "label",
        "help",
        "error",
        "id",
        "modelValue",
        "checked"
    ],
    emits: ['update:modelValue'],
    computed: {
        value: {
            get() {
                return this.modelValue
            },
            set(value : any) {
                this.$emit('update:modelValue', value)
            }
        }
    }
};
</script>
