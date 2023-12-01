<template>
    <span>
        <label
            :for="id"
            class="text-[12px] text-dark mb-1 block"
            v-if="label"
        >
            {{ label }}
            <span class="text-red" v-if="$attrs.required">*</span>
        </label>
        <div class="relative mb-2" v-bind:class="{ 'has-error': error }">
            <i
                v-bind:class="icon"
                class="absolute top-[11px] left-4 text-[18px] text-[#A4A4A4]"
                v-if="icon"
            ></i>
            <select
                v-bind="$attrs"
                v-bind:class="icon ? 'ps-10' : ''"
                @change="
                    $emit(
                        'update:modelValue',
                        ($event.target as HTMLInputElement).value
                    )
                "
                class="bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray disabled:bg-light-gray"
                :class="class"
            >
                <slot />
            </select>
            <small
                v-if="error"
                class="mt-[-7px] error-text mb-4 block text-[11px]"
                >{{ error }}</small
            >
            <small class="block mt-[-7px] text-[10px] mb-4" v-if="help">{{
                help
            }}</small>
        </div>
    </span>
</template>
<script lang="ts">
export default {
    props: ["label", "icon", "help", "id", "error", "class"],
};
</script>
