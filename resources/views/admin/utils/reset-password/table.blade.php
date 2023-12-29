@foreach ($data as $row)
    <tr>
        <td>{{ ucwords($row->user_role) }}</td>
        {{-- <td>{{ $row->user_role === 'users' ? $row->user_name : $row->merchant_name }}</td> --}}
        <td>{{ $row->name }}</td>
        <td>{{ $row->phone_number }}</td>
        <td>{{ $row->request_at }}</td>
        <td>
            @if ($row->status == 'pending')
                <span class="bg-danger badge text-white">PENDING</span>
            @else
                <span class="bg-success badge text-white">DONE</span>
            @endif
        </td>
        <td>{{ $row->resolve_at ?: '-' }}</td>
        <td class="text-end">
            @if (itcan('edit admin.reset-password') || itcan('delete admin.reset-password'))
                    <a href="{{ adminRoute('admin.reset-password.edit', $row->uuid) }}" class="btn-secondary btn-action " style="text-align: center">
                        Edit
                    </a>
            @endif
        </td>
    </tr>
@endforeach
