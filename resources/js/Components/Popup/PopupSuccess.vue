<template>
    <Popup :close="close">
        <icSuccess class="mx-auto mb-3" />
        <h2 class="text-center mb-2 font-semibold text-base">
            {{ title }}
        </h2>
        <h2 class="text-center text-xs" v-if="subTitle">
            {{ subTitle }}
        </h2>
        <ButtonSolidBlue
            class="mx-auto mt-8 min-w-[200px] justify-center"
            x-on:click="popup=false"
            @click="confirmAction"
        >
            {{ textButton ?? 'Okay' }}
        </ButtonSolidBlue>
    </Popup>
</template>

<script setup lang="ts">
    import Popup from '@/Components/Popup/Popup.vue';
    import icSuccess from '@/Components/Icon/Image/Success.vue'
    import ButtonSolidBlue from '@/Components/Button/SolidBlue.vue';

    const emit = defineEmits(["action"]);
    defineProps<{
        title: string;
        subTitle?: string;
        close?: boolean;
        textButton?: string;
        action?: any;
    }>();

    const confirmAction = () => {
        emit("action", () => {
        });
    };
</script>