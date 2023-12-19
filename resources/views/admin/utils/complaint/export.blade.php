<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Role</th>
            <th>Title</th>
            <th>Message</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ date('d M Y, H:i', strtotime($row->created_at)) }}</td>
                <td>{{ $row->user_role }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->message }}</td>

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
