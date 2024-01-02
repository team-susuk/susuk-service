@foreach ($data as $row)
    @php
        $commision = $row->commission ? json_decode($row->commission) : [];
    @endphp
    <tr>
        @itcan('delete admin.slider')
            <td>
                @if (!$row->merchant_id)
                    <div class="form-checkbox">
                        <input type="checkbox" class="table-checkbox" value="{{ $row->uuid }}" name="selected_ids[]">
                    </div>
                @endif
            </td>
        @enditcan
        <td>
            @if ($row->profile)
                <a href="{{ asset($row->profile) }}" target="_blank">
                    <img src="{{ asset($row->profile) }}" alt="" class="img-thumbnail img-table"
                        style="width: 90px !important">
                </a>
            @endif
        </td>
        <td>{{ $row->username }}</td>
        <td>{{ $row->address }}</td>
        <td>
            @if ($row->profile)
                {{ @$commision->start }}% - {{ @$commision->end }}%
            @endif
        </td>
        <td>
            <a href="{{ asset($row->image) }}" target="_blank">
                <img src="{{ asset($row->image) }}" alt="" class="img-thumbnail img-table" style="width: 100px">
            </a>
        </td>
        <td>{{ $row->expired_at ?: '-' }}</td>
        <td>{{ $row->merchant_id ? 'Merchant' : 'Admin' }}</td>
        <td>{{ $row->sorting }}</td>
        <td>Rp{{ number_format($row->price) }}</td>
        <td>{{ $row->benefit_value }} {{ ucwords($row->benefit_type) }}</td>
        <td class="text-end">
            @if (itcan('edit admin.slider') || itcan('delete admin.slider'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle btn-action"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                        @itcan('edit admin.slider')
                            <li>
                                <a href="{{ adminRoute('admin.slider.edit', $row->uuid) }}" class="dropdown-item">Edit</a>
                            </li>
                        @enditcan
                        @itcan('delete admin.slider')
                            <li>
                                <a href="javascript:;" data-toggle="confirmation"
                                    data-message="{{ __('adminportal.delete_confirmation') }}"
                                    data-action="{{ adminRoute('admin.slider.destroy', $row->uuid) }}" data-method="DELETE"
                                    class="dropdown-item">Delete</a>
                            </li>
                        @enditcan
                    </ul>
                </div>
            @endif
        </td>
    </tr>
@endforeach
