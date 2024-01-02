@foreach ($data as $row)
    <tr>
        @itcan('delete admin.guide')
            <td>
                <div class="form-checkbox">
                    <input type="checkbox" class="table-checkbox" value="{{ $row->uuid }}" name="selected_ids[]">
                </div>
            </td>
        @enditcan
        <td>
            <a href="{{ asset($row->profile) }}" target="_blank">
                <img src="{{ asset($row->profile) }}" alt="" class="img-thumbnail img-table"
                    style="width: 40px !important">
            </a>
        </td>
        <td>
            {{ $row->name }}
        </td>
        <td>{{ $row->nick_name }}</td>
        <td>{{ $row->code }}</td>
        <td>{{ $row->phone_number }}</td>
        <td>{{ $row->province_name }}</td>
        <td>{{ $row->city_name }}</td>
        <td>{{ $row->district_name }}</td>
        <td>{{ $row->register_at }}</td>
        <td>{{ $row->status->label() }}</td>
        <td class="text-end">
            @if (itcan('edit admin.guide') || itcan('delete admin.guide'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle btn-action"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                        @itcan('edit admin.guide')
                            <li>
                                <a href="{{ adminRoute('admin.guide.edit', $row->uuid) }}" class="dropdown-item">Edit</a>
                            </li>
                        @enditcan
                        @itcan('delete admin.guide')
                            <li>
                                <a href="javascript:;" data-toggle="confirmation"
                                    data-message="{{ __('adminportal.delete_confirmation') }}"
                                    data-action="{{ adminRoute('admin.guide.destroy', $row->uuid) }}" data-method="DELETE"
                                    class="dropdown-item">Delete</a>
                            </li>
                        @enditcan
                        <li>
                            <a href="{{ adminRoute('admin.guide.show', $row->uuid) }}" class="dropdown-item">Detail</a>
                        </li>
                    </ul>
                </div>
            @endif
        </td>
    </tr>
@endforeach
@push('js')
    <script>
        document.querySelector('#modal-export-data .form-group:nth-child(2)').remove()
        document.querySelector('#modal-export-data .modal-body').insertAdjacentHTML('beforeend',
            '<input type="hidden" name="file_format" value="xlsx"/>')
    </script>
@endpush
