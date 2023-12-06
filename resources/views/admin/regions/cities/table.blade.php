@foreach ($data as $row)
<tr>
    <td>{{$row->province?->name}}</td>
    <td>{{$row->name}}</td>
</tr>
@endforeach