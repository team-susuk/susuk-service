@foreach ($data as $row)
    <tr>
        @itcan('delete admin.price-configs')
            <td>
                <div class="form-checkbox">
                    <input type="checkbox" class="table-checkbox" value="{{ $row->uuid }}" name="selected_ids[]">
                </div>
            </td>
        @enditcan
        <td>{{ $row->name }}</td>
        <td>{{ $row->description }}</td>
        <td>{{ $row->type->label() }}</td>
        <td>Rp.{{ number_format($row->price) }}</td>
        <td>
            @if($row->discount_type=='percent')
                {{$row->discount}}%
            @else
                Rp.{{number_format($row->discount)}}
            @endif
        </td>
        <td>
            {{ $row->benefit_value }} {{ $row->benefit_type }}
        </td>
        <td class="text-end">
            @if (itcan('edit admin.price-configs') || itcan('delete admin.price-configs'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle btn-action" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                        @itcan('edit admin.price-configs')
                            <li>
                                <a href="{{ adminRoute('admin.price-configs.edit', $row->uuid) }}"
                                    class="dropdown-item">Edit</a>
                            </li>
                        @enditcan
                        @itcan('delete admin.price-configs')
                            <li>
                                <a href="javascript:;" data-toggle="confirmation"
                                    data-message="{{ __('adminportal.delete_confirmation') }}"
                                    data-action="{{ adminRoute('admin.price-configs.destroy', $row->uuid) }}"
                                    data-method="DELETE" class="dropdown-item">Delete</a>
                            </li>
                        @enditcan
                    </ul>
                </div>
            @endif
        </td>
    </tr>
@endforeach
