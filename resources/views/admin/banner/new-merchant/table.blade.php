@foreach ($data as $row)
    @php
        $commision = $row->commission ? json_decode($row->commission) : [];
    @endphp
    <tr>
        <td>
            <a href="{{ asset($row->profile) }}" target="_blank">
                <img src="{{ asset($row->profile) }}" alt="" class="img-thumbnail img-table"
                    style="width: 90px !important">
            </a>
        </td>
        <td>{{ $row->username }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ @$commision->start }}% - {{ @$commision->end }}%</td>
        <td>
            {{ $row->start_at }}
        </td>
        <td>
            {{ $row->expired_at }}
        </td>
        <td class="text-end">
            @if (itcan('edit admin.new-merchant') || itcan('delete admin.new-merchant'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary  btn-action" data-toggle="confirmation"
                        data-message="{{ __('adminportal.delete_confirmation') }}"
                        data-action="{{ adminRoute('admin.new-merchant.destroy', $row->uuid) }}" data-method="DELETE">
                        Delete
                    </button>
                </div>
            @endif
        </td>
    </tr>
@endforeach
