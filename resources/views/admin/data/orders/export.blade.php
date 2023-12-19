<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Role</th>
            <th>User</th>
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
                <td>{{ $row->user_role }}</td>
                <td>
                    @if ($row->user_role === 'guest')
                        {{ $row->guest_name }}
                    @else
                        {{ $row->merchant_name }}
                    @endif
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