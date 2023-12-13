<template>
    <label
        :for="id"
        class="text-[12px] text-dark mb-1 block"
        v-if="label"
    >
        {{ label }}
        <span class="text-red" v-if="$attrs.required">*</span>
    </label>
    <div class="relative mb-2" x-data="{input: ''}">
        <i
            v-bind:class="icon"
            class="absolute top-[13px] left-4 text-[16px]"
            v-if="icon"
        ></i>
        <textarea
            x-model="input"
            v-bind="$attrs"
            v-bind:class="icon ? 'ps-10' : ''"
            @input="
                $emit(
                    'update:modelValue',
                    ($event.target as HTMLInputElement).value
                )
            "
            class="bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray"
            :value="value"
        >
            <slot/>
        </textarea>
        <div class="mb-4" v-if="$attrs.maxlength">
            <p class="text-[11px] text-dark">
                <span x-text="input.length" class="input-length"></span>/{{ $attrs.maxlength }}
            </p>
        </div>
    </div>
</template>
<script lang="ts">
export default {
    props: ["label", "icon", "help", "id", "value"],
};
</script>
