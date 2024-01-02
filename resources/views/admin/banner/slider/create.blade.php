<x-portal::input.image name="image" label="Image" placeholder="Image" horizontal></x-portal::input.image>
<x-portal::input type="text" name="title" label="Title" placeholder="Title"
    horizontal>{{ old('title') }}</x-portal::input>
<x-portal::input.textarea name="description" label="Description" placeholder="Description" horizontal
    rows="7">{{ old('description') }}</x-portal::input.textarea>
<x-portal::input type="number" name="sorting" label="Sorting" placeholder="Sorting"
    horizontal>{{ old('sorting') }}</x-portal::input>

@push('css')
    <style>
        .form-image-upload {
            width: 100% !important;
            height: 170px !important;
        }

        .form-image-upload.rounded {
            border-radius: 10px !important;
        }

        .form-image-upload.rounded::after {
            bottom: 10px !important;
            right: 10px !important;
        }
    </style>
@endpush
