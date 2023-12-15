<table>
    <thead>
        <tr>
            <th>Date Create</th>
            <th>Guide</th>
            <th>Merchant</th>
            <th>Waktu Kedatangan</th>
            <th>Jumlah Tamu</th>
            <th>Jenis Tamu</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ date('Y-m-d H:i:s', strtotime($row->created_at)) }}</td>
                <td>{{ $row->user?->name }}</td>
                <td>{{ $row->merchant?->name }}</td>
                <td>{{ $row->time_arrival }}</td>
                <td>{{ $row->guest_number }}</td>
                <td>{{ $row->guest_type->label() }}</td>
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
