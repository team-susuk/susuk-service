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
            <img
                :src="fileUrl()"
                alt=""
                class=" object-cover absolute inset-0 opacity-30"
                v-if="dropzoneFile"
            />
            <div class="flex-center flex-col z-[2] relative w-full h-full">
                <div
                    v-show="isDragging"
                    class="absolute inset-0 rounded-lg flex-center text-white text-3xl font-semibold"
                    :style="{ background: 'rgba(0, 0, 0, 0.3)', opacity: isDragging ? 1 : 0, transition: 'opacity 0.3s' }"
                >
                    Place here
                </div>
                <icGalleryExport class="mb-2" />
                <label :for="id" class="text-neutral-dark-gray text-sm"><span class="font-semibold">Drag</span> file atau <span class="font-semibold">klik</span> untuk upload image</label>
                <input :id="id" ref="input" class="drop-zone-file" type="file" @change="selectedFile" accept="image/x-png,image/jpeg,image/jpg" hidden />
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
    import { ref, watch } from "vue";
    import icGalleryExport from "@/Components/Icon/Etc/GalleryExport.vue";

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
                emit("update:modelValue", null)
                showAlert("Invalid image format. Please upload a PNG or JPEG image.", "error")
            }
        }
    };

    const fileUrl = () => {
        if (dropzoneFile.value) {
            return URL.createObjectURL(dropzoneFile.value);
        }
        return ''
    };

    watch(dropzoneFile, validateImage);

    validateImage();

</script>