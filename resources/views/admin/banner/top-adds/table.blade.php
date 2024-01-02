@foreach ($data as $row)
    <tr>
        <td>
            <a href="{{ asset($row->profile) }}" target="_blank">
                <img src="{{ asset($row->profile) }}" alt="" class="img-thumbnail img-table"
                    style="width: 90px !important">
            </a>
        </td>
        <td>{{ $row->username }}</td>
        <td>{{ $row->address }}</td>
        <td>
            <a href="{{ asset($row->image) }}" target="_blank">
                <img src="{{ asset($row->image) }}" alt="" class="img-thumbnail img-table"
                    style="width: 90px !important">
            </a>
        </td>
        <td>
            {{ date('Y-m-d',strtotime($row->created_at)) }}
        </td>
        <td>
            {{ $row->expired_at }}
        </td>
        <td>Rp{{ number_format($row->price) }}</td>
        <td>{{$row->benefit_value}} {{ucwords($row->benefit_type)}}</td>
        <td class="text-end">
            @if (itcan('edit admin.top-adds') || itcan('delete admin.top-adds'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary  btn-action" data-toggle="confirmation"
                        data-message="{{ __('adminportal.delete_confirmation') }}"
                        data-action="{{ adminRoute('admin.top-adds.destroy', $row->uuid) }}" data-method="DELETE">
                        Delete
                    </button>
                </div>
            @endif
        </td>
    </tr>
@endforeach
