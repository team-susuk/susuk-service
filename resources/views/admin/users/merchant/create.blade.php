<x-portal::input.image name="profile" label="Foto Toko" placeholder="Foto Toko" horizontal></x-portal::input.image>
<x-portal::input type="text" name="name" label="Nama Toko" placeholder="Nama Toko"
    horizontal>{{ old('name') }}</x-portal::input>
<x-portal::input.textarea name="description" label="Description" placeholder="Description"
    horizontal></x-portal::input.textarea>
<x-portal::input.select name="category_id" label="Kategori Toko" placeholder="Kategori Toko" horizontal>
    <option value="">Pilih Kategori</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</x-portal::input.select>
<x-portal::input.select name="province_id" label="Provinsi" placeholder="Provinsi" horizontal>
    <option value="">Pilih Provinsi</option>
    @foreach ($provinces as $province)
        <option @selected(old('province_id') === $province->id) value="{{ $province->id }}">{{ $province->name }}</option>
    @endforeach
</x-portal::input.select>
<x-portal::input.select name="city_id" label="Kabupaten/kotamadya" placeholder="Kabupaten/kotamadya" horizontal>
    <option value="">Pilih Kabupaten/kotamadya</option>
</x-portal::input.select>
<x-portal::input.select name="subdistrict_id" label="Kecamatan" placeholder="Kecamatan" horizontal>
    <option value="">Pilih Kecamatan</option>
</x-portal::input.select>
<x-portal::input.textarea name="address" label="Alamat Toko" placeholder="Alamat Toko"
    horizontal>{{ old('address') }}</x-portal::input.textarea>
<x-portal::input type="text" name="pic_name" label="Nama PIC" placeholder="Nama PIC"
    horizontal>{{ old('pic_name') }}</x-portal::input>
<x-portal::input type="number" name="phone_number" label="Phone Number" placeholder="Phone Number"
    horizontal>{{ old('phone_number') }}</x-portal::input>
<x-portal::input type="number" name="whatsapp_number" label="Whatsapp Number" placeholder="Whatsapp Number"
    horizontal>{{ old('whatsapp_number') }}</x-portal::input>
<div class="form-group row ">
    <label for="" class="label col-sm-2">
        Range Komisi (%)
        <span class="required">*</span>
    </label>
    <div class="col-sm-6 d-flex gap-2 align-items-center">
        <input type="number" max="100" name="commission_start" placeholder="Start" required="required"
            class="form-control " value="">
        <span>-</span>
        <input type="number" max="100" name="commission_end" placeholder="End" required="required"
            class="form-control " value="">
    </div>
</div>
<x-input.multiple-select name="weekdays[]" label="Weekdays" placeholder="Weekdays" horizontal>
    <option value="">Pilih Hari</option>
    <option value="Senin">Senin</option>
    <option value="Selasa">Selasa</option>
    <option value="Rabu">Rabu</option>
    <option value="Kamis">Kamis</option>
    <option value="Jumat">Jumat</option>
</x-input.multiple-select>
<div class="form-group row ">
    <label for="" class="label col-sm-2">
        Waktu Weekdays
        <span class="required">*</span>
    </label>
    <div class="col-sm-6 d-flex gap-2 align-items-center">
        <input type="text" name="weekday_time_start" placeholder="Buka" required="required" class="form-control timepicker"
            value="">
        <span>-</span>
        <input type="text" name="weekday_time_end" placeholder="Tutup" required="required" class="form-control timepicker"
            value="">
    </div>
</div>
<x-input.multiple-select name="weekends[]" required="false" label="Weekends" placeholder="Weekends" horizontal>
    <option value="">Pilih Hari</option>
    <option value="Sabtu">Sabtu</option>
    <option value="Minggu">Minggu</option>
</x-input.multiple-select>
<div class="form-group row ">
    <label for="" class="label col-sm-2">
        Waktu Weekends
    </label>
    <div class="col-sm-6 d-flex gap-2 align-items-center">
        <input type="text" name="weekend_time_start" placeholder="Buka" class="form-control timepicker" value="">
        <span>-</span>
        <input type="text" name="weekend_time_end" placeholder="Tutup" class="form-control timepicker" value="">
    </div>
</div>
<x-portal::input type="file" accept="application/pdf" name="siup_document" label="Sip Document" required="false"
    placeholder="Sip Document" horizontal>{{ old('siup_document') }}</x-portal::input>
<x-portal::input type="password" name="password" label="Password" placeholder="Password"
    horizontal>{{ old('password') }}</x-portal::input>

<x-portal::input.select.asset />
@push('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        const provinceSelected = ""
        const citySelected = ""
        const subdistrictSelected = ""
        document.querySelectorAll('.timepicker').forEach((timepicker) => {
            flatpickr(timepicker, {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });
        })
    </script>
    <script src="{{ asset('admin/js/regions.js') }}"></script>
    <style>
        .form-image-upload.rounded {
            width: 100% !important;
            border-radius: 10px !important;
        }
    </style>
@endpush
