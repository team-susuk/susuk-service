<template>
    <AuthLayout :hide-nav="true">
        <Head title="Detail Pesan" />
        <HeaderDetail :backUrl="back_url" title="Detail Pesan" />

        <div class="py-3 flex gap-3 w-full items-center">
            <div>
                <Info />
            </div>
            <div class="flex flex-col gap-1 w-full">
                <p class="text-base font-semibold">{{ data.title }}</p>
                <p class="text-neutral-gray-3 text-xs font-light">{{ data.time }}</p>
            </div>
        </div>
        <p class="text-neutral-gray-2 text-sm">{{ data.description }}</p>
        <template v-if="data.broadcast">
            <img
                :src="data.broadcast.file_url" alt=""
                class="w-40 rounded"
                v-if="data.broadcast.type === 'text_image'"
            >
            <div class="rounded-xl flex-center border border-silver p-2 gap-2 w-fit mt-2" v-if="data.broadcast.type === 'text_file'">
                <File />
                <p class="font-semibold text-sm text-blue">File</p>
            </div>
        </template>

    </AuthLayout>
</template>

<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Guide/AuthLayout.vue'
    import HeaderDetail from '@/Components/Navigation/HeaderDetail.vue'
    import Info from '@/Components/Icon/Etc/Info.vue';
    import File from '@/Components/Icon/Etc/File.vue';

    const props = defineProps(["data", "back_url"])

</script>