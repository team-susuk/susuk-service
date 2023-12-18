<template>
    <Head title="Total Member" />
    <AuthLayout>
        <HeaderBlue title="Total Member" />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
            <div
                v-for="user in usersType"
                :key="user.name"
                class="shadow-card rounded-lg bg-white p-3 flex gap-3"
            >
                <div>
                    <component :is="user.icon"></component>
                </div>
                <div>
                    <p class="text-lg md:text-xl font-semibold">
                        {{
                            user.name == 'Guide' ?
                            users.guide
                            : (
                                user.name == 'Driver' ?
                                users.driver :
                                users.freelance
                            )
                        }}
                    </p>
                    <p class="text-sm text-neutral-gray-3">
                        {{ user.name }}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between mb-3">
            <h2
                class="font-bold text-lg"
            >List Member</h2>
            <a
                class="border border-neutral-gray-2 text-neutral-gray-2 rounded-full text-sm font-semibold px-3 py-2 cursor-pointer"
                @click="() => clickId('popup-filter')"
            >
                <i class="isax icon-sort"></i>
                Filter
            </a>
        </div>

        <div
            class="overflow-auto border-none "
        >
            <table class="border-collapse table-auto w-full text-xs">
                <thead>
                    <tr>
                        <Th>Nama</Th>
                        <Th>Profesi</Th>
                        <Th>Provinsi</Th>
                        <Th>Kabupaten/Kotamadya</Th>
                        <Th>Bahasa</Th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="!paginate?.loading.value" v-for="row in paginate.data.value">
                        <Td>{{ row.nick_name }}</Td>
                        <Td>{{ row.profession }}</Td>
                        <Td>{{ row.province }}</Td>
                        <Td>{{ row.city }}</Td>
                        <Td>{{ row.languages }}</Td>
                    </tr>
                    <tr v-if="paginate?.loading.value">
                        <Td>
                            <div class="h-5 w-full animate-pulse bg-gray-200 rounded-2xl"></div>
                        </Td>
                        <Td>
                            <div class="h-5 w-full animate-pulse bg-gray-200 rounded-2xl"></div>
                        </Td>
                        <Td>
                            <div class="h-5 w-full animate-pulse bg-gray-200 rounded-2xl"></div>
                        </Td>
                        <Td>
                            <div class="h-5 w-full animate-pulse bg-gray-200 rounded-2xl"></div>
                        </Td>
                        <Td>
                            <div class="h-5 w-full animate-pulse bg-gray-200 rounded-2xl"></div>
                        </Td>
                    </tr>
                    <tr
                        v-if="
                            !paginate?.loading.value &&
                            !paginate?.data?.value?.length &&
                            paginate
                        "
                        >
                        
                        <Td colspan="5" class="text-center py-5">
                            <EmptyState class="mx-auto" />
                        </Td>
                    </tr>
                </tbody>
            </table>
        </div>

        <Pagination
            v-if="
                paginate?.data?.value?.length &&
                paginate
            "
            :information="paginate.information.value"
            @next="paginate.next()"
            @prev="paginate.prev()"
            @goToPage="paginate.goToPage"
        />
    </AuthLayout>
    <FilterMember
        :languages="languages"
        :regions="regions"
    />
</template>

<script setup lang="ts">
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthLayout from '@/Layouts/Merchant/AuthLayout.vue'
    import HeaderBlue from '@/Components/Navigation/HeaderBlue.vue'
    import Pagination from '@/Components/Others/Pagination.vue';

    import ImageGuide from '@/Components/Icon/Image/Guide.vue'
    import ImageDriver from '@/Components/Icon/Image/Driver.vue'
    import ImageFreelance from '@/Components/Icon/Image/Freelance.vue'
    import { ref, shallowRef } from 'vue';
    import { clickId } from '@/plugins/functions/global'
    import Th from '@/Components/Table/Th.vue';
    import Td from '@/Components/Table/Td.vue';
    import FilterMember from './FilterMember.vue';
    import { usePaginate } from '@/hooks/pagination';
    import EmptyState from '@/Components/Icon/Image/EmptyState.vue';

    const props = defineProps(["languages", "regions", "users"])

    const usersType = ref([
        {
            icon: shallowRef(ImageGuide),
            name: "Guide"
        },
        {
            icon: shallowRef(ImageDriver),
            name: "Driver"
        },
        {
            icon: shallowRef(ImageFreelance),
            name: "Freelance"
        }
    ])

    const paginate = usePaginate({
        route: route('merchant.member.index-data')
    })

</script>