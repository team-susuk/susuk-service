<x-portal::input.image name="image" label="Image" placeholder="Image" horizontal required="false">
     {{asset($row->image)}}
</x-portal::input.image>
<x-portal::input.select name="merchant_id" label="Merchant" placeholder="Merchant" horizontal>
    <option value="">Pilih Merchant</option>
    @foreach ($merchants as $merchant)
        <option @selected($row->merchant_id==$merchant->id) value="{{ $merchant->id }}">{{ $merchant->name }}</option>
    @endforeach
</x-portal::input.select>
<x-portal::input type="text" name="name" label="Name" placeholder="Name"
    horizontal>{{ $row->name }}</x-portal::input>
<x-portal::input.textarea name="description" label="Description" placeholder="Description"
    horizontal>{{ $row->description }}</x-portal::input.textarea>
<x-portal::input type="number" name="price" label="Price" placeholder="Price"
    horizontal>{{ $row->price }}</x-portal::input>
<x-portal::input type="number" max="100" name="commission" label="Komisi (%)" placeholder="Komisi (%)"
    horizontal>{{ $row->commission }}</x-portal::input>

<x-portal::input.select.asset />
@push('js')
    <style>
        .form-image-upload.rounded {
            width: 100% !important;
            border-radius: 10px !important;
        }
    </style>
@endpush
