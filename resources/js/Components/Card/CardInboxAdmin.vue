<template>
    <div class="border-b border-silver p-3 flex gap-3">
        <div>
            <Info />
        </div>
        <div class="flex flex-col gap-1">
            <p class="text-neutral-gray-3 text-xs font-light">Informasi</p>
            <p class="text-base font-semibold">{{ data.title }}</p>
            <p class="text-neutral-gray-2 text-sm">{{ data.description }}</p>
            <img
                :src="data.broadcast.file_url" alt=""
                class="w-40 rounded"
                v-if="data.broadcast.type === 'text_image'"
            >
            <div class="rounded-xl flex-center border border-silver p-2 gap-2 w-fit mt-2" v-if="data.broadcast.type === 'text_file'">
                <File />
                <p class="font-semibold text-sm text-blue">Dafar panduan susuk.pdf</p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
    import Info from '../Icon/Etc/Info.vue';
    import File from '../Icon/Etc/File.vue';

    defineProps([
        "data"
    ])
</script>