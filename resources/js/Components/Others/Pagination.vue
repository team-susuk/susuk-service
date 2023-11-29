<template>
    <div class="flex items-center justify-between mt-5">
        <div class="flex items-center gap-2">
            <Link href="javascript:;" class="text-neutral-dark-gray">
                <i class="isax icon-arrow-left-2 text-xl"></i>
            </Link>

            <Link href="javascript:;"
                v-for="i in 5" class="h-8 w-8 flex-center rounded hover:bg-neutral-dark-gray hover:text-white text-xs transition-all"
                :class="{
                    'bg-neutral-dark-gray text-white': i === 1,
                    'bg-white text-neutral-dark-gray': i !== 1
                }"
            >
                {{ i }}
            </Link>

            <Link href="javascript:;" class="text-neutral-dark-gray">
                <i class="isax icon-arrow-right-3 text-xl"></i>
            </Link>
        </div>

        <span class="text-xs font-medium text-neutral-gray-3">
            1-9 Dari 45
        </span>
    </div>
</template>

<script setup lang="ts">
    import { Link } from '@inertiajs/vue3'
</script>