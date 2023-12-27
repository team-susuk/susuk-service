@foreach ($data as $row)
    <tr>
        @itcan('delete admin.merchant')
            <td>
                <div class="form-checkbox">
                    <input type="checkbox" class="table-checkbox" value="{{ $row->uuid }}" name="selected_ids[]">
                </div>
            </td>
        @enditcan
        <td>
            <a href="{{ asset($row->profile) }}" target="_blank">
                <img src="{{ asset($row->profile) }}" alt="" class="img-thumbnail img-table" style="width: 90px !important">
            </a>
        </td>
        <td>
            {{$row->name}}
        </td>
        <td>{{ $row->category?->name }}</td>
        <td>{{ $row->code }}</td>
        <td>{{ $row->pic_name }}</td>
        <td>{{ $row->phone_number }}</td>
        <td>{{ $row->whatsapp_number }}</td>
        <td>{{ $row->register_at }}</td>
        <td>{{ $row->viewer }}</td>
        <td>{{ $row->status?->label() }}</td>
        <td class="text-end">
            @if (itcan('edit admin.merchant') || itcan('delete admin.merchant'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle btn-action"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                        @itcan('edit admin.merchant')
                            <li>
                                <a href="{{ adminRoute('admin.merchant.edit', $row->uuid) }}"
                                    class="dropdown-item">Edit</a>
                            </li>
                        @enditcan
                        @itcan('delete admin.merchant')
                            <li>
                                <a href="javascript:;" data-toggle="confirmation"
                                    data-message="{{ __('adminportal.delete_confirmation') }}"
                                    data-action="{{ adminRoute('admin.merchant.destroy', $row->uuid) }}"
                                    data-method="DELETE" class="dropdown-item">Delete</a>
                            </li>
                        @enditcan
                        <li>
                            <a href="{{ adminRoute('admin.merchant.show', $row->uuid) }}" class="dropdown-item">Detail</a>
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
        document.querySelector('#modal-export-data .modal-body').insertAdjacentHTML('beforeend','<input type="hidden" name="file_format" value="xlsx"/>')
    </script>
@endpush