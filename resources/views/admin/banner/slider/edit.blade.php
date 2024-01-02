@if (!$row->merchant_id)
    <x-portal::input.image name="image" label="Image" placeholder="Image" horizontal required="false">
        {{ asset($row->image) }}
    </x-portal::input.image>
    <x-portal::input type="text" name="title" label="Title" placeholder="Title"
        horizontal>{{ $row->title }}</x-portal::input>
    <x-portal::input type="text" name="description" label="Description" placeholder="Description"
        horizontal>{{ $row->description }}</x-portal::input>
@endif
<x-portal::input type="text" name="sorting" label="Sorting" placeholder="Sorting"
    horizontal>{{ $row->sorting }}</x-portal::input>


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
