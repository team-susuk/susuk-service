<template>
    <label
        :for="id"
        class="text-[12px] text-dark mb-1 block"
        v-if="label"
    >
        {{ label }}
        <span class="text-red" v-if="$attrs.required">*</span>
    </label>
    <div class="relative mb-2">
        <label
            class="bg-white rounded-lg w-full mb-2 border border-light-gray h-[150px] flex-center cursor-pointer relative flex-col overflow-hidden"
            @dragover.prevent="onDragOver"
            @dragenter.prevent="onDragEnter"
            @dragleave.prevent="onDragLeave"
            @drop.prevent="onDrop"
            :for="id"
            :class="{ 'bg-gray-200': isDragging }"
        >
            <div class="flex-center flex-col z-[2] relative w-full h-full">
                <div
                    v-show="isDragging"
                    class="absolute inset-0 rounded-lg flex-center text-white text-3xl font-semibold"
                    :style="{ background: 'rgba(0, 0, 0, 0.3)', opacity: isDragging ? 1 : 0, transition: 'opacity 0.3s' }"
                >
                    Place here
                </div>
                <icFile class="mb-2" />
                <label :for="id" class="text-neutral-dark-gray text-sm"><span class="font-semibold">Drag</span> file atau <span class="font-semibold">klik</span> untuk upload</label>
                <div v-if="dropzoneFile" class="mt-2 max-w-[250px]">
                    <p class="text-[12px] text-dark">Selected File:</p>
                    <p class="text-[12px] text-dark font-semibold truncate">{{ fileInfo }}</p>
                </div>
                <input :id="id" ref="input" class="drop-zone-file" type="file" @change="selectedFile" hidden />
            </div>
        </label>
        <div class="mb-4" v-if="$attrs.maxlength">
            <p class="text-[11px] text-dark float-right"><span x-text="input.length"></span>/{{ $attrs.maxlength }}</p>
        </div>
        <small v-if="error" class="mt-[-7px] error-text mb-4 block text-[11px]">{{ error }}</small>
        <small class="block mt-[-7px] text-[10px] mb-4" v-if="help">{{
            help
        }}</small>
    </div>
</template>

<script setup lang="ts">
    import { showAlert } from "@/plugins/functions/global";
    import { ref, watch, computed } from "vue";
    import icFile from "@/Components/Icon/Etc/File.vue";

    const emit = defineEmits(["update:modelValue"]);
    const props = defineProps<{
        id: string;
        label?: string;
        name?: string;
        error?: any;
        help?: any;
        modelValue: any
    }>()

    const dropzoneFile = ref<File | undefined>(undefined);
    const isDragging = ref(false);
    let dragCounter = 0;

    const onDragOver = (e: DragEvent) => {
        e.preventDefault();
        isDragging.value = true;
        e.dataTransfer!.dropEffect = "copy";
    };

    const onDragEnter = (e: DragEvent) => {
        dragCounter++; // Increment the counter on drag enter
        if (dragCounter > 0) {
            isDragging.value = true;
        }
    };

    const onDragLeave = () => {
        dragCounter--; // Decrement the counter on drag leave
        if (dragCounter <= 0) {
            isDragging.value = false;
        }
    };


    const onDrop = (e: DragEvent) => {
        dragCounter = 0;
        isDragging.value = false;
        if (e.dataTransfer && e.dataTransfer.files) {
            const file = e.dataTransfer.files[0];
            if (file) {
                dropzoneFile.value = file
                emit("update:modelValue", file);
            }
        }
    };

    const selectedFile = (event: Event) => {
        const inputElement = event.target as HTMLInputElement;
        const files = inputElement.files;
        if (files && files.length > 0) {
            dropzoneFile.value = files[0];
            updateModel()
        }
    };

    const updateModel = () => {
        if (dropzoneFile.value) {
            emit("update:modelValue", dropzoneFile.value)

            if (dropzoneFile.value?.size) {
                if (dropzoneFile.value.size > 2 * 1024 * 1024) {
                    (document.getElementById(props.id) as HTMLInputElement).value = "";
                    dropzoneFile.value = undefined;
                    emit("update:modelValue", null);
                    showAlert("File terlalu besar, harap unggah file yang lebih kecil dari 2MB.", "error");
                    return;
                }
            }
        } else {
            (document.getElementById(props.id) as HTMLInputElement).value = ""
            emit("update:modelValue", null)

        }
    };

    const validateImage = () => {
        if (dropzoneFile.value) {
            const acceptedFormats = ["image/png", "image/jpeg", "image/jpg"];
            if (!acceptedFormats.includes(dropzoneFile.value.type)) {
                (document.getElementById(props.id) as HTMLInputElement).value = ""
                dropzoneFile.value = undefined
                emit("update:modelValue", null)
                showAlert("Format file tidak valid, harap unggah file dengan format PNG atau JPEG atau JPG.", "error")
            }
        }
    };

    const fileUrl = () => {
        if (dropzoneFile.value) {
            return URL.createObjectURL(dropzoneFile.value);
        }
        return ''
    };

    const fileInfo = computed(() => {
        if (dropzoneFile.value) {
            return `${dropzoneFile.value.name} (${(dropzoneFile.value.size / 1024).toFixed(2)} KB)`;
        }
        return 'Tidak ada file yang dipilih';
    });

    // watch(dropzoneFile, validateImage);

    // validateImage();

</script>