@foreach ($data as $row)
    <tr>
        <td>
            {{date('d M Y, H:i:s',strtotime($row->created_at))}}
        </td>
        <td>{{$row->merchant_name}}</td>
        <td>{{$row->address_merchant}}</td>
        <td>{{ $row->type->label() }}</td>
        <td>{{ $row->benefit_value }} {{ $row->benefit_type }}</td>
        <td>Rp{{ number_format($row->price) }}</td>
    </tr>
@endforeach

@push('js')
    <script>
        document.querySelector('#modal-export-data .form-group:nth-child(2)').remove()
        document.querySelector('#modal-export-data .modal-body').insertAdjacentHTML('beforeend',
            '<input type="hidden" name="file_format" value="xlsx"/>')
    </script>
@endpush
