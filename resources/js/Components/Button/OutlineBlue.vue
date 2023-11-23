<template>
    <Link v-bind="$attrs" v-bind:class="classElement" :href="href" v-if="href">
        <i v-bind:class="icon" class="text-sm" v-if="icon"></i>
        <slot />
    </Link>
    <button v-bind="$attrs" v-bind:class="classElement" :type="type || 'button'" v-if="!href">
        <i v-bind:class="icon" class="text-sm" v-if="icon"></i>
        <slot />
    </button>
</template>
<script lang="ts">
import { Link } from '@inertiajs/vue3';
import LoadingButton from '@/Components/Icon/Etc/LoadingButton.vue';

export default {
    components: {
        LoadingButton, Link
    },
    props: ['href', 'icon', 'type'],
    setup(props, components) {
        const classElement = `text-medium border border-blue bg-transparent px-4 text-blue py-3 rounded-lg text-sm flex items-center gap-1 h-fit text-center disabled:bg-[#ddd] disabled:text-[#AFAFAF] disabled:cursor-not-allowed`;

        return {
            classElement
        }
    }
}
</script>