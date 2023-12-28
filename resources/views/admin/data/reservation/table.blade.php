@foreach ($data as $row)
<tr>
    <td>{{date('Y-m-d H:i:s',strtotime($row->created_at))}}</td>
    <td>{{$row->user?->name}}</td>
    <td>{{$row->merchant?->name}}</td>
    <td>{{$row->merchant?->address}}</td>
    <td>{{$row->time_arrival}}</td>
    <td>{{$row->guest_number}}</td>
    <td>{{$row->guest_type->label()}}</td>
</tr>
@endforeach

@push('js')
    <script>
        document.querySelector('#modal-export-data .form-group:nth-child(2)').remove()
        document.querySelector('#modal-export-data .modal-body').insertAdjacentHTML('beforeend','<input type="hidden" name="file_format" value="xlsx"/>')
    </script>
@endpush