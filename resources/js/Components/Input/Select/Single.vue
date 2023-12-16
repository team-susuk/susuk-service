<template>
    <label
        :for="id"
        class="text-[12px] text-dark mb-1 block"
        v-if="label"
    >
        {{ label }}
        <span class="text-red" v-if="$attrs.required">*</span>
    </label>
    <div
        class="relative mb-2"
        x-data="{input: $el.getAttribute('data-value'),dropdownOpen : false}"
        :data-value="$attrs.value || ''"
        v-bind:class="{ 'has-error': error }"
    >
        <div
            class="border border-light-gray rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] flex gap-2 flex-wrap outline-none py-2 w-full mb-2 items-center"
            :id="'wrapper_single_'+id"
        >
            <div
                class="mt-[3px] flex-1 h-full min-w-[100px] cursor-pointer whitespace-nowrap overflow-hidden font-medium"
                x-on:click="dropdownOpen=!dropdownOpen"
                v-for="item in (selected as any)"
            >
                {{ item.name }}
            </div>
            <div
                class="mt-[3px] flex-1 h-full min-w-[100px] cursor-pointer whitespace-nowrap overflow-hidden font-medium"
                x-on:click="dropdownOpen=true"
                @click="updateDropdownWidth"
                v-bind:class="{ 'text-[#ddd]': selected.length }"
                v-if="!selected.length"
            >
                {{ placeholder }}
            </div>
        </div>
        <i
            class="isax icon-arrow-down-1 float-right mt-[-37px] me-4 text-[#B4B6B8] text-[13px]"
        ></i>
        <div class="mb-4" v-if="$attrs.maxlength">
            <p class="text-[11px] text-dark float-right">
                <span x-text="input.length"></span>/{{ $attrs.maxlength }}
            </p>
        </div>
        <div
            class="fixed w-full z-10"
            x-transition:enter="transition ease-out duration-50"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100"
            x-show="dropdownOpen"
            x-on:click.away="dropdownOpen = false"
            :class="{ 'bottom-0': !bottomPlacement, 'fixed': popup, 'absolute': !popup  }"
        >
            <div
                class="bg-white border rounded-lg w-full max-h-60 p-2 flex flex-col"
                :style="{
                    width: dropdownWidth
                }"
            >
                <div>
                    <input
                        type="text"
                        v-model="search"
                        class="bg-white rounded-lg placeholder:text-neutral-gray px-4 text-xs outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray"
                        :placeholder="'Cari '+ label"
                    />
                </div>
                <ul class="flex-1 overflow-auto">
                    <li v-for="item in filterData()" :key="item.id">
                        <a
                            href="javascript:;"
                            class="flex gap-3 p-[5px] px-2 rounded-md hover:bg-neutral-light-gray text-sm text-dark transition-all"
                            x-on:click="dropdownOpen=false"
                            @click="addItem(item)"
                        >
                            {{ item.name }}
                        </a>
                    </li>
                </ul>
            </div>
            <br /><br />
        </div>
        <small
            v-if="error"
            class="mt-[-7px] error-text mb-4 block text-[11px]"
            >{{ error }}</small
        >
        <small
            class="block mt-[-7px] text-[10px] mb-4 text-[#A3A3A3]"
            v-if="help"
            >{{ help }}</small
        >
    </div>
</template>

<script lang="ts" setup>
import { ref, watch, onMounted } from "vue";

const emit = defineEmits(["update:modelValue"]);
const props = defineProps<{
    placeholder: string;
    label?: string;
    help?: string;
    error?: string;
    id?: string;
    data: Array<any>;
    selected?: any;
    popup?: boolean
}>();

const search = ref("");
const selected = ref([]);
const dropdownWidth = ref("auto")
const bottomPlacement = ref(true)
const data = ref(props.data)

const addItem = (row: any) => {
    const selectedIds = selected.value.map((val: any) => val.id);
    if (!selectedIds.includes(row.id)) {
        (selected.value as any) = [{
            id: row.id,
            name: row.name,
        }]
        emit(
            "update:modelValue",
            row.id
        );
    }
};

const updateDropdownWidth = () => {
    const wrapper = document.getElementById(`wrapper_single_${props.id}`);
    if (props.popup) {
        if (wrapper) {
            dropdownWidth.value = `${wrapper.getBoundingClientRect().width}px`;
            if (window.innerHeight - wrapper.getBoundingClientRect().bottom < 250) {
                bottomPlacement.value = false;
            } else {
                bottomPlacement.value = true;
            }
        } else {
            dropdownWidth.value = "auto";
        }
    }
}

onMounted(() => {
    if (props.selected) {
        const itemSelected: any = [];
        const selectedId = props.selected
        props.data.forEach((row: any) => {
            if (selectedId == row.id) {
                itemSelected.push({
                    id: row.id,
                    name: row.name,
                });
            }
        });
        selected.value = itemSelected
    }

    updateDropdownWidth();

    // Add event listener for window resize
    window.addEventListener('resize', updateDropdownWidth)
});

const filterData = () => {
    let searchValue = search.value.toLowerCase()
    return data.value.filter(function (row: any) {
        return row.name.toLowerCase().includes(searchValue);
    });
}

watch(
() => props.data,
(oldValue, newValue) => {
    data.value = newValue
})
</script>
