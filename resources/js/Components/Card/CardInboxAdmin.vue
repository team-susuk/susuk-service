<template>
    <div class="border-b border-silver p-3 flex gap-3">
        <div>
            <Info />
        </div>
        <div class="flex flex-col gap-1">
            <div class="flex items-center justify-between">
                <p class="text-neutral-gray-3 text-xs font-light">Informasi</p>
                <p class="text-neutral-gray-3 text-xs font-light">{{ data.time }}</p>
            </div>
            <p class="text-base font-semibold">{{ data.title }}</p>
            <p class="text-neutral-gray-2 text-sm line-clamp-2 whitespace-pre-wrap">{{ data.description }}</p>
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