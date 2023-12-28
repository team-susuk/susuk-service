<x-portal::input type="text" name="name" label="Nama lengkap (sesuai KTP)" placeholder="Nama lengkap (sesuai KTP)"
    horizontal>{{ $row->name }}</x-portal::input>
<x-portal::input type="text" name="nick_name" label="Nama Panggilan" placeholder="Nama Panggilan"
    horizontal>{{ $row->nick_name }}</x-portal::input>
<x-portal::input type="date" name="birthday" label="Tanggal Lahir" placeholder="Birthday"
    horizontal>{{ $row->birthday }}</x-portal::input>
<x-portal::input type="number" name="phone_number" label="Nomor WA" placeholder="Nomor WA"
    horizontal>{{ $row->phone_number }}</x-portal::input>
<x-portal::input.image name="profile" label="Profile" placeholder="Profile" horizontal required="false">
    {{ asset($row->profile) }}
</x-portal::input.image>
<x-portal::input.select name="profession_id" label="Profesi" placeholder="Profesi" horizontal>
    <option value="">Pilih Profesi</option>
    @foreach ($professions as $profession)
        <option @selected($row->profession_id === $profession->id) value="{{ $profession->id }}">{{ $profession->name }}</option>
    @endforeach
</x-portal::input.select>
<x-input.multiple-select name="languages[]" label="Bahasa" placeholder="Bahasa" horizontal>
    <option value="">Pilih Bahasa</option>
    @foreach ($languages as $lang)
        <option @selected(in_array($lang->lang, $row->languages)) value="{{ $lang->lang }}">{{ $lang->lang }}</option>
    @endforeach
</x-input.multiple-select>
<x-portal::input type="password" name="password" label="Password" placeholder="Password" required="false"
    help-text="Biarkan kosong jika tidak ingin mengubah password" horizontal></x-portal::input>
<div class="form-group row ">
    <label for="" class="label col-sm-2">
        Status
        <span class="required">*</span>
    </label>
    <div class="col-sm-6 d-flex gap-2 align-items-center">
        <select name="status" id="status" class="form-control" required>
            <option value="">Pilih Status</option>
            @foreach ($status as $item)
                <option @selected($row->status === $item) value="{{ $item->value }}">{{ $item->label() }}</option>
            @endforeach
        </select>
    </div>
</div>
<x-portal::input.select.asset />
