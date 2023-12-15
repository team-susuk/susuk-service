@foreach ($data as $row)
<tr>
    <td>{{$row->user_id}}</td>
    <td>{{$row->user_role}}</td>
    <td>{{$row->type}}</td>
    <td>{{$row->image}}</td>
    <td>{{$row->benefit_value}}</td>
    <td>{{$row->benefit_type}}</td>
    <td>{{$row->price}}</td>
    <td>{{$row->status}}</td>
    <td>{{$row->expired_at}}</td>
    <td>{{$row->pay_at}}</td>
</tr>
@endforeach

@push('js')
    <script>
        document.querySelector('#modal-export-data .form-group:nth-child(2)').remove()
        document.querySelector('#modal-export-data .modal-body').insertAdjacentHTML('beforeend','<input type="hidden" name="file_format" value="xlsx"/>')
    </script>
@endpush