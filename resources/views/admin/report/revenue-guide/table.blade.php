@foreach ($data as $row)
    <tr>
        <td>
            {{date('d M Y, H:i:s',strtotime($row->created_at))}}
        </td>
        <td>
            <a href="{{ asset($row->profile) }}" target="_blank">
                <img src="{{ asset($row->profile) }}" alt="" class="img-thumbnail img-table"
                    style="width: 40px !important">
            </a>
        </td>
        <td>{{$row->user_name}}</td>
        <td>{{ $row->province_name }}</td>
        <td>{{ $row->city_name }}</td>
        <td>{{ $row->district_name }}</td>
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
