<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nama Paket</th>
            <th>Paket</th>
            <th>Harga</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>
                    {{ date('d M Y, H:i:s', strtotime($row->created_at)) }}
                </td>
                <td>{{ $row->merchant_name }}</td>
                <td>{{ $row->address_merchant }}</td>
                <td>{{ $row->type->label() }}</td>
                <td>{{ $row->benefit_value }} {{ $row->benefit_type }}</td>
                <td>Rp{{ number_format($row->price) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
