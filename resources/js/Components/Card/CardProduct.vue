<template>
    <div class="rounded-[14px] border border-silver p-[14px] flex flex-col gap-2 cursor-pointer" v-bind:class="class">
        <div @click="confirmAction">
            <img
                :src="data.profile_url" 
                class="w-full h-48 object-cover rounded-lg mb-1"
            >
            <p class="mb-1 font-medium text-base whitespace-pre-wrap">{{ data.name }}</p>
            <p class="mb-1 text-lg text-neutral-dark-gray whitespace-pre-wrap font-bold">Rp150.000</p>
            <p class="mb-2 text-xxs text-neutral-gray-2 line-clamp-2 whitespace-pre-wrap">Tas Selempang Bulat berbentuk Kendi/Bola Decoupage BUNGA SESUAI FOTO Diameter 20cm</p>
            <OutlineOrange class="!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full !cursor-default">
                Komisi: 15%
            </OutlineOrange>
        </div>
        <div x-data="{popup: false}" v-if="!href" class="cursor-default">
            <a hidden ref="trigger_popup" x-on:click="popup=true"></a>
            <Popup
                title="Detail Produk"
                class="lg:max-w-lg xl:max-w-2xl"
            >
                <div class="flex flex-col lg:flex-row gap-5">
                    <div class="flex-shrink-0">
                        <img src="https://plus.unsplash.com/premium_photo-1698442704192-086265cf630e?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                            class="w-72 h-72 object-cover rounded-lg mb-1 aspect-square"
                        >
                    </div>
                    <div>
                        <p class="mb-3 font-semibold text-lg">{{ data.name }}</p>
                        <p class="mb-3 font-bold text-xl">Rp{{ data.price_formated }}</p>
                        <OutlineOrange class="!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mb-4 !cursor-default">
                            Komisi: {{ data.commission }}%
                        </OutlineOrange>
                        <p class="mb-2 text-xs text-neutral-dark-gray">Deskripsi Toko</p>
                        <p class="text-sm font-medium">{{ data.description }}</p>
                    </div>
                </div>
            </Popup>
        </div>
    </div>

</template>

<script setup lang="ts">
    import { router } from "@inertiajs/vue3";
    import OutlineOrange from "../Button/OutlineOrange.vue";
    import Popup from "../Popup/Popup.vue";
    import { ref } from 'vue'

    const emit = defineEmits(["action"]);

    const trigger_popup = ref<any>(null)

    const props = defineProps<{
        class?: any,
        href?: any
        data: any
    }>()

    const confirmAction = () => {
        if (props.href) {
            router.visit(props.href)
        } else {
            trigger_popup.value?.click()
        }
        emit("action", () => {
        });
    }

</script>