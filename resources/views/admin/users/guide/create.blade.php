<x-portal::input type="text" name="name" label="Nama lengkap (sesuai KTP)" placeholder="Nama lengkap (sesuai KTP)"
    horizontal>{{ old('name') }}</x-portal::input>
<x-portal::input type="text" name="nick_name" label="Nama Panggilan" placeholder="Nama Panggilan"
    horizontal>{{ old('nick_name') }}</x-portal::input>
<x-portal::input type="date" name="birthday" label="Tanggal Lahir" placeholder="Birthday"
    horizontal>{{ old('birthday') }}</x-portal::input>
<x-portal::input type="number" name="phone_number" label="Nomor WA" placeholder="Nomor WA"
    horizontal>{{ old('phone_number') }}</x-portal::input>
<x-portal::input.image name="profile" label="Profile" placeholder="Profile" horizontal></x-portal::input.image>
<x-portal::input.select name="profession_id" label="Profesi" placeholder="Profesi" horizontal>
    <option value="">Pilih Profesi</option>
    @foreach($professions as $profession)
    <option value="{{$profession->id}}">{{$profession->name}}</option>
    @endforeach
</x-portal::input.select>
<x-input.multiple-select name="languages[]" label="Bahasa" placeholder="Bahasa" horizontal>
    <option value="">Pilih Bahasa</option>
    @foreach($languages as $lang)
    <option value="{{$lang->id}}">{{$lang->lang}}</option>
    @endforeach
</x-input.multiple-select>
<x-portal::input type="password" name="password" label="Password" placeholder="Password"
    horizontal>{{ old('password') }}</x-portal::input>
<x-portal::input.select.asset />
