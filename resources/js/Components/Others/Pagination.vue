<template>
    <div class="flex items-center justify-between mt-5">
        <div class="flex items-center gap-2">
            <a href="javascript:;" class="text-neutral-dark-gray" @click="prev">
                <i class="isax icon-arrow-left-2 text-xl"></i>
            </a>

            <!-- First Page Link -->
            <a
                v-if="currentPage > 3"
                href="javascript:;"
                class="h-8 w-8 flex-center rounded hover:bg-neutral-dark-gray hover:text-white text-xs transition-all"
                :class="{
                'bg-neutral-dark-gray text-white': 1 === currentPage,
                'bg-white text-neutral-dark-gray': 1 !== currentPage
                }"
                @click="goToPage(1)"
            >
                1
            </a>

            <!-- Display Dots if there are more pages to show -->
            <span
                v-if="currentPage > 4"
                class="h-8 w-8 flex-center rounded text-neutral-dark-gray bg-transparent text-xs transition-all"
            >...</span>

            <!-- Page Links -->
            <template v-for="i in totalPages">
                <a
                    href="javascript:;"
                    class="h-8 w-8 flex-center rounded hover:bg-neutral-dark-gray hover:text-white text-xs transition-all"
                    :class="{
                    'bg-neutral-dark-gray text-white': i === currentPage,
                    'bg-white text-neutral-dark-gray': i !== currentPage
                    }"
                    @click="goToPage(i)"
                >
                    {{ i }}
                </a>
            </template>

            <!-- Display Dots if there are more pages to show -->
            <span
                v-if="currentPage < totalPages - 3"
                class="h-8 w-8 flex-center rounded text-neutral-dark-gray bg-transparent text-xs transition-all"
            >...</span>

            <!-- Last Page Link -->
            <a
                v-if="currentPage < totalPages - 2"
                href="javascript:;"
                class="h-8 w-8 flex-center rounded hover:bg-neutral-dark-gray hover:text-white text-xs transition-all"
                :class="{
                'bg-neutral-dark-gray text-white': totalPages === currentPage,
                'bg-white text-neutral-dark-gray': totalPages !== currentPage
                }"
                @click="goToPage(totalPages)"
            >
                {{ totalPages }}
            </a>
    
            <a href="javascript:;" class="text-neutral-dark-gray" @click="next">
                <i class="isax icon-arrow-right-3 text-xl"></i>
            </a>
        </div>
    
        <span class="text-xs font-medium text-neutral-gray-3">
            {{ information?.from || 0 }}-{{ information?.to || 0}} dari {{ information?.total }}
        </span>
    </div>
</template>
<script setup lang="ts">
    import { Link } from '@inertiajs/vue3'
    import { computed, ref } from 'vue';
    const emit = defineEmits(["next", "prev", "goToPage"]);
    const props = defineProps<{
        information?: any;
    }>();

    const currentPage = ref(props.information.current_page);
    const totalPages = computed(() => props.information.last_page);
    const itemsPerPage = props.information.per_page; // Ubah sesuai dengan jumlah item per halaman
    const totalItems = props.information.total;

    const next = () => {
        if (currentPage.value < totalPages.value) {
            emit("next");
            currentPage.value++;
        }
    };
    const prev = () => {
        if (currentPage.value > 1) {
            emit("prev");
            currentPage.value--;
        }
    };
    const goToPage = (page: number) => {
        if (page >= 1 && page <= totalPages.value) {
            currentPage.value = page;
            emit("goToPage", page);
        }
    };
</script>