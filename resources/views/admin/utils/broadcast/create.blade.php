<x-portal::input.select name="type" label="Type" placeholder="Type" horizontal>
    <option value="">Pilih Type</option>
    @foreach ($types as $type)
        <option value="{{ $type->value }}">{{ $type->label() }}</option>
    @endforeach
</x-portal::input.select>
<x-portal::input.select name="for_role" label="For Role" placeholder="For Role" horizontal>
    <option value="all">Semua</option>
    <option value="merchant">Merchant</option>
    <option value="guide">Guide</option>
</x-portal::input.select>
<x-portal::input type="text" name="title" label="Judul" placeholder="Judul"
    horizontal>{{ old('title') }}</x-portal::input>
<x-portal::input.textarea name="description" label="Deskripsi" placeholder="Deskripsi"
    horizontal>{{ old('description') }}</x-portal::input.textarea>
<div class="text_file d-none">
    <x-portal::input type="file" name="file" label="File" placeholder="File" required="false"
        horizontal>{{ old('file') }}</x-portal::input>
</div>
<div class="text_gambar d-none">
    <x-portal::input type="file" name="file_gambar" label="Gambar" placeholder="Gambar" required="false"
        horizontal>{{ old('file_gambar') }}</x-portal::input>
</div>


@push('js')
    <script src="{{ asset('admin/js/broadcast.js') }}"></script>
@endpush
