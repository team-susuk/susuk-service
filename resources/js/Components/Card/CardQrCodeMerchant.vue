<template>
    <div class="rounded-[14px] border border-silver p-3 flex flex-col gap-3" v-bind:class="class">
        <div class="flex gap-2 pb-3 border-b border-[#F2F6FE]">
            <div>
                <img src="https://images.unsplash.com/photo-1682695798256-28a674122872?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                    class="w-12 h-12 object-cover rounded-full aspect-square"
                >
            </div>
            <div class="flex flex-col gap-1 flex-auto">
                <div class="flex items-center justify-between w-full">
                    <p class="text-xxs text-neutral-gray-2 font-medium">
                        120927
                    </p>
                    <p class="text-xxs text-neutral-gray-2 font-medium">
                        20 nov 2023 09.00
                    </p>
                </div>
                <p class="text-sm font-semibold">
                    Esther Howard
                </p>
                <p class="text-xxs">
                    Bali, Badung
                </p>
            </div>
        </div>
        <div class="flex gap-8">
            <div class="flex-center gap-2">
                <div>
                    <Guest />
                </div>
                <span class="font-medium text-sm">
                    140
                </span>
            </div>
            <div class="flex-center gap-2">
                <div>
                    <GlobalSearch />
                </div>
                <span class="font-medium text-sm">
                    Lokal
                </span>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">

    import Guest from "../Icon/Etc/Guest.vue";
    import GlobalSearch from "../Icon/Etc/GlobalSearch.vue";

    defineProps<{
        class?: any
    }>()

</script>