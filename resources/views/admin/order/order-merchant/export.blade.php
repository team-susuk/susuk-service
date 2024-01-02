<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Name</th>
            <th>Benefit</th>
            <th>Price</th>
            <th>Image</th>
            <th>Status</th>
            <th>Pay At</th>
            <th>Expired At</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->type }}</td>
                <td>
                   {{$row->user_name}}
                </td>
                <td>{{ $row->benefit_value }} {{ $row->benefit_type }}</td>
                <td>{{ number_format($row->price) }}</td>
                <td>
                    @if ($row->image)
                        <a href="{{ asset($row->image) }}">{{ asset($row->image) }}</a>
                    @endif
                </td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->pay_at }}</td>
                <td>{{ $row->expired_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>