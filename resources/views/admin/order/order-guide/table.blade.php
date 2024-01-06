@foreach ($data as $row)
    <tr>
        <td>{{ $row->type->label() }}</td>
        <td>
            {{ $row->user_name }}
        </td>
        <td>{{ $row->benefit_value }} {{ $row->benefit_type }}</td>
        <td>Rp{{ number_format($row->price) }}</td>
        <td>
            @if ($row->image)
                <a href="{{ asset($row->image) }}" target="_blank">
                    <img src="{{ asset($row->image) }}" alt="" class="img-thumbnail img-table"
                        style="width: 60px !important">
                </a>
            @endif
        </td>
        <td>{{ $row->status->label() }}</td>
        <td>{{ $row->pay_at }}</td>
        <td>{{ $row->expired_at ?: 'Lifetime' }}</td>
        <td class="text-end">
            @if (itcan('edit admin.guide') || itcan('delete admin.guide'))
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle btn-action" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                        @itcan('edit admin.orders')
                            <li>
                                <a href="javascript:;" data-toggle="confirmation"
                                    data-message="Apakah Anda Yakin ingin mengubah status pembayaran menjadi `PAID`?"
                                    data-action="{{ route('admin.order-merchant.update-status', [$row->uuid, 'paid']) }}"
                                    data-method="POST" class="dropdown-item">Set PAID</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="confirmation"
                                    data-message="Apakah Anda Yakin ingin mengubah status pembayaran menjadi `Failed`?"
                                    data-action="{{ route('admin.order-merchant.update-status', [$row->uuid, 'failed']) }}"
                                    data-method="POST" class="dropdown-item">Set Failed</a>
                            </li>
                        @enditcan
                        @itcan('delete admin.orders')
                            <li>
                                <a href="javascript:;" data-toggle="confirmation"
                                    data-message="{{ __('adminportal.delete_confirmation') }}"
                                    data-action="{{ adminRoute('admin.order-merchant.destroy', $row->uuid) }}" data-method="DELETE"
                                    class="dropdown-item">Delete</a>
                            </li>
                        @enditcan
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
