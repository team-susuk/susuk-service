<table>
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Nama Panggilan</th>
            <th>ID Guide</th>
            <th>Tanggal Lahir</th>
            <th>Nomor Whatsapp</th>
            <th>Profesi</th>
            <th>Bahasa</th>
            <th>Status</th>
            <th>Waktu Registrasi</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->nick_name }}</td>
                <td>{{ $row->code }}</td>
                <td>{{ $row->birthday }}</td>
                <td>{{ $row->phone_number }}</td>
                <td>{{ $row->profession?->name }}</td>
                <td>{{ implode(' , ',$row->languages) }}</td>
                <td>{{ $row->status->label() }}</td>
                <td>{{ $row->register_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
@if ($type == 'pdf')
    <style>
        table tr th,
        table tr td {
            font-size: 12px
        }
    </style>
@endif
