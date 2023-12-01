<template>
    <label
        :for="id"
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
        <i
            v-bind:class="icon"
            class="absolute top-[11px] left-4 text-[18px] text-dark"
            v-if="icon"
        ></i>
        <input
            v-bind="$attrs"
            v-bind:class="icon ? 'ps-12' : ''"
            x-model="input"
            @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)"
            class="bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray disabled:bg-light-gray"
            :class="class"
        />
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
        "icon",
        "help",
        "error",
        "id",
        "class",
        "modelValue"
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
