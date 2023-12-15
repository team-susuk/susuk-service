<table>
    <thead>
        <tr>
            <th>Nama Toko</th>
            <th>Code</th>
            <th>Description</th>
            <th>Kategori Toko</th>
            <th>Provinsi</th>
            <th>Kabupaten/kotamadya</th>
            <th>Kecamatan</th>
            <th>Alamat Toko</th>
            <th>Nama PIC</th>
            <th>Phone Number</th>
            <th>Whatsapp Number</th>
            <th>Range Komisi (%)</th>
            <th>Weekdays</th>
            <th>Waktu Weekdays</th>
            <th>Weekends</th>
            <th>Waktu Weekend</th>
            <th>SIUP Document</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->code }}</td>
                <td>{{ $row->description }}</td>
                <td>{{ $row->category?->name }}</td>
                <td>{{ $row->province?->name }}</td>
                <td>{{ $row->city?->name }}</td>
                <td>{{ $row->subdistrict?->name }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->pic_name }}</td>
                <td>'{{ $row->phone_number }}</td>
                <td>'{{ $row->whatsapp_number }}</td>
                <td>{{ $row->commission['start'] }}% - {{ $row->commission['end'] }}%</td>
                <td> {{ implode(' , ',$row->weekdays) }}</td>
                <td>{{ $row->weekday_time['start'] }} - {{ $row->weekday_time['end'] }}</td>
                <td> {{ implode(' , ',$row->weekends) }}</td>
                <td>{{ $row->weekend_time['start'] }} - {{ $row->weekend_time['end'] }}</td>
                <td>{{ asset($row->siup_document) }}</td>
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
