@foreach ($data as $row)
    <tr>
        @itcan('delete admin.banner')
            <td>
                @if (!$row->merchant_id)
                    <div class="form-checkbox">
                        <input type="checkbox" class="table-checkbox" value="{{ $row->uuid }}" name="selected_ids[]">
                    </div>
                @endif
            </td>
        @enditcan
        <td>
            <a href="{{ asset($row->image) }}" target="_blank">
                <img src="{{ asset($row->image) }}" alt="" class="img-thumbnail img-table" style="width: 100px">
            </a>
        </td>
        <td>{{ $row->expired_at ?: '-' }}</td>
        <td>{{ $row->merchant_id ? 'Merchant' : 'Admin' }}</td>
        <td>{{ $row->sorting }}</td>
        <td class="text-end">
            @if (itcan('edit admin.banner') || itcan('delete admin.banner'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle btn-action"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                        @itcan('edit admin.banner')
                            <li>
                                <a href="{{ adminRoute('admin.banner.edit', $row->uuid) }}" class="dropdown-item">Edit</a>
                            </li>
                        @enditcan
                        @if (!$row->merchant_id)
                            @itcan('delete admin.banner')
                                <li>
                                    <a href="javascript:;" data-toggle="confirmation"
                                        data-message="{{ __('adminportal.delete_confirmation') }}"
                                        data-action="{{ adminRoute('admin.banner.destroy', $row->uuid) }}"
                                        data-method="DELETE" class="dropdown-item">Delete</a>
                                </li>
                            @enditcan
                        @endif
                    </ul>
                </div>
            @endif
        </td>
    </tr>
@endforeach
