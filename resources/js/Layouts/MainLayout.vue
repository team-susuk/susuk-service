<template>
    <div class="w-full fixed bottom-5 left-0 z-[1000] flex justify-center flex-col items-center" x-data="{alert_flash: false}">
        <div
            class="alert px-5 py-2 transition-all duration-75 rounded-md flex items-center gap-2 w-fit"
            id="alert-flash-message"
            x-transition:enter="transition ease-out duration-300 transform origin-top"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300 transform origin-bottom"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            x-show="alert_flash"
        >
            <i class="isax icon-tick-circle text-white"></i>
            <span class="text-[11px] text-white">
                
            </span>
        </div>

        <a x-on:click="alert_flash=true" id="show-alert-flash" class="hidden"></a>
        <a x-on:click="alert_flash=false" id="hide-alert-flash" class="hidden"></a>
    </div>
    
    <section class="py-7 px-5 md:px-10">
        <slot />
    </section>
</template>

<script setup lang="ts">
    import { usePage } from '@inertiajs/vue3';
    import { ref, watch } from 'vue';
    import { showAlert } from '@/plugins/functions/global';

    const page = usePage()

    watch(
        () => page.props.flash,
        (newValue, oldValue) => {
            if (newValue?.success) {
                showAlert(newValue.success, 'success')
            }
            if (newValue?.error) {
                showAlert(newValue.success, 'error')
            }
        }
    );
</script>