<template>
    <Head title="Scan QR" />
    <AuthLayout>
        <HeaderBlue title="Scan QR" />
        <TabMenu active="qrcode" />

        <div class="flex items-center flex-col gap-4 text-center max-w-md mx-auto mt-8">
            <QrcodeStream @decode="onDecode" @init="onInit"></QrcodeStream>
            <div class="flex flex-center flex-col gap-2" v-if="status">
                <i class="isax-b icon-warning-2 text-red text-6xl"></i>
                <p class="font-semibold text-red whitespace-pre-line">
                    {{ status }}
                </p>
            </div>
        </div>
    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import TabMenu from './TabMenu.vue';

    import { QrcodeStream } from 'vue3-qrcode-reader';
    import { ref } from 'vue';

    const status = ref('')

    const onDecode = (decodedString: any) => {
        console.log('QR code decoded:', decodedString);
    }

    const onInit = (promise: any) => {
        promise.then(() => {
            status.value = ''
        }).catch((error: any) => {
            status.value = 'Initialization error: ' + error + '\n Please refresh your browser'
            status.value = status.value.replace("NotReadableError: ", "")
        });
    }

</script>