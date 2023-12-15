<x-portal::input.image name="profile" label="Foto Toko" placeholder="Foto Toko" horizontal required="false">
    {{ asset($row->profile) }}
</x-portal::input.image>
<x-portal::input type="text" name="name" label="Nama Toko" placeholder="Nama Toko"
    horizontal>{{ $row->name }}</x-portal::input>
<x-portal::input.textarea name="description" label="Description" placeholder="Description"
    horizontal>{{ $row->description }}</x-portal::input.textarea>
<x-portal::input.select name="category_id" label="Kategori Toko" placeholder="Kategori Toko" horizontal>
    <option value="">Pilih Kategori</option>
    @foreach ($categories as $category)
        <option @selected($row->category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</x-portal::input.select>
<x-portal::input.select name="province_id" label="Provinsi" placeholder="Provinsi" horizontal>
    <option value="">Pilih Provinsi</option>
    @foreach ($provinces as $province)
        <option @selected($row->province_id === $province->id) value="{{ $province->id }}">{{ $province->name }}</option>
    @endforeach
</x-portal::input.select>
<x-portal::input.select name="city_id" data-selected="{{ $row->city_id }}" label="Kabupaten/kotamadya"
    placeholder="Kabupaten/kotamadya" horizontal>
    <option value="">Pilih Kabupaten/kotamadya</option>
</x-portal::input.select>
<x-portal::input.select name="subdistrict_id" data-selected="{{ $row->subdistrict_id }}" label="Kecamatan"
    placeholder="Kecamatan" horizontal>
    <option value="">Pilih Kecamatan</option>
</x-portal::input.select>
<x-portal::input.textarea name="address" label="Alamat Toko" placeholder="Alamat Toko"
    horizontal>{{ $row->address }}</x-portal::input.textarea>
<x-portal::input type="text" name="pic_name" label="Nama PIC" placeholder="Nama PIC"
    horizontal>{{ $row->pic_name }}</x-portal::input>
<x-portal::input type="number" name="phone_number" label="Phone Number" placeholder="Phone Number"
    horizontal>{{ $row->phone_number }}</x-portal::input>
<x-portal::input type="number" name="whatsapp_number" label="Whatsapp Number" placeholder="Whatsapp Number"
    horizontal>{{ $row->whatsapp_number }}</x-portal::input>
<div class="form-group row ">
    <label for="" class="label col-sm-2">
        Range Komisi (%)
        <span class="required">*</span>
    </label>
    <div class="col-sm-6 d-flex gap-2 align-items-center">
        <input type="number" max="100" name="commission_start" placeholder="Start" required="required"
            class="form-control " value="{{ $row->commission['start'] }}">
        <span>-</span>
        <input type="number" max="100" name="commission_end" placeholder="End" required="required"
            class="form-control " value="{{ $row->commission['end'] }}">
    </div>
</div>
<x-input.multiple-select name="weekdays[]" label="Weekdays" placeholder="Weekdays" horizontal>
    <option value="">Pilih Hari</option>
    <option @selected(in_array('Senin',$row->weekdays)) value="Senin">Senin</option>
    <option @selected(in_array('Selasa',$row->weekdays)) value="Selasa">Selasa</option>
    <option @selected(in_array('Rabu',$row->weekdays)) value="Rabu">Rabu</option>
    <option @selected(in_array('Kamis',$row->weekdays)) value="Kamis">Kamis</option>
    <option @selected(in_array('Jumat',$row->weekdays)) value="Jumat">Jumat</option>
</x-input.multiple-select>
<div class="form-group row ">
    <label for="" class="label col-sm-2">
        Waktu Weekdays
        <span class="required">*</span>
    </label>
    <div class="col-sm-6 d-flex gap-2 align-items-center">
        <input type="time" name="weekday_time_start" placeholder="Buka" required="required" class="form-control "
            value="{{ $row->weekday_time['start'] }}">
        <span>-</span>
        <input type="time" name="weekday_time_end" placeholder="Tutup" required="required" class="form-control "
            value="{{ $row->weekday_time['end'] }}">
    </div>
</div>
<x-input.multiple-select name="weekends[]" label="Weekends" placeholder="Weekends" horizontal>
    <option value="">Pilih Hari</option>
    <option @selected(in_array('Sabtu',$row->weekends)) value="Sabtu">Sabtu</option>
    <option @selected(in_array('Minggu',$row->weekends)) value="Minggu">Minggu</option>
</x-input.multiple-select>
<div class="form-group row ">
    <label for="" class="label col-sm-2">
        Waktu Weekends
        <span class="required">*</span>
    </label>
    <div class="col-sm-6 d-flex gap-2 align-items-center">
        <input type="time" name="weekend_time_start" placeholder="Buka" required="required"
            class="form-control " value="{{ $row->weekend_time['start'] }}">
        <span>-</span>
        <input type="time" name="weekend_time_end" placeholder="Tutup" required="required" class="form-control "
            value="{{ $row->weekend_time['end'] }}">
    </div>
</div>
<x-portal::input type="file" accept="application/pdf" name="siup_document" label="Sip Document"
    placeholder="Sip Document" horizontal required="false"
    help-text="Biarkan kosong jika tidak ingin mengubah"></x-portal::input>

<x-portal::input.select.asset />
@push('js')
    <script>
        const provinceSelected = "{{ $row->province_id }}"
        const citySelected = "{{ $row->city_id }}"
        const subdistrictSelected = "{{ $row->subdistrict_id }}"
    </script>
    <script src="{{ asset('admin/js/regions.js') }}"></script>
    <style>
        .form-image-upload.rounded {
            width: 100% !important;
            border-radius: 10px !important;
        }
    </style>
@endpush
