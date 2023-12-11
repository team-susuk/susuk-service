@foreach ($data as $row)
    <tr>
        @itcan('delete admin.complaint')
            <td>
                <div class="form-checkbox">
                    <input type="checkbox" class="table-checkbox" value="{{ $row->uuid }}" name="selected_ids[]">
                </div>
            </td>
        @enditcan
        <td>{{ date('d M Y, H:i', strtotime($row->created_at)) }}</td>
        <td>{{ ucwords($row->user_role) }}</td>
        <td>{{ $row->title }}</td>
        <td>{{ $row->message }}</td>
        <td class="text-end">
            @if (itcan('edit admin.complaint') || itcan('delete admin.complaint'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-action" data-toggle="confirmation"
                        data-message="{{ __('adminportal.delete_confirmation') }}"
                        data-action="{{ adminRoute('admin.complaint.destroy', $row->uuid) }}" data-method="DELETE">
                        Delete
                    </button>
                </div>
            @endif
        </td>
    </tr>
@endforeach
