@foreach ($data as $row)
    <tr>
        <td>{{ $row->type }}</td>
        <td>{{ $row->for_role }}</td>
        <td>{{ $row->title }}</td>
        <td>{{ $row->description }}</td>
        <td>
            @if ($row->file)
                <a href="{{ asset($row->file) }}" target="_blank">Lihat File/Gambar</a>
            @endif
        </td>
        <td class="text-end">
            @if (itcan('edit admin.broadcast') || itcan('delete admin.broadcast'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle btn-action" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                        @itcan('edit admin.broadcast')
                            <li>
                                <a href="{{ adminRoute('admin.broadcast.edit', $row->uuid) }}" class="dropdown-item">Edit</a>
                            </li>
                        @enditcan
                        @itcan('delete admin.broadcast')
                            <li>
                                <a href="javascript:;" data-toggle="confirmation"
                                    data-message="{{ __('adminportal.delete_confirmation') }}"
                                    data-action="{{ adminRoute('admin.broadcast.destroy', $row->uuid) }}"
                                    data-method="DELETE" class="dropdown-item">Delete</a>
                            </li>
                        @enditcan
                    </ul>
                </div>
            @endif
        </td>
    </tr>
@endforeach
