<table>
    <thead>
        <tr>
            <th>User Id</th>
            <th>User Role</th>
            <th>Type</th>
            <th>Image</th>
            <th>Benefit Value</th>
            <th>Benefit Type</th>
            <th>Price</th>
            <th>Status</th>
            <th>Expired At</th>
            <th>Pay At</th>
            <th>Data</th>

        </tr>
    </thead>
    <tbody>
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
            <td>{{$row->data}}</td>

    </tr>
    @endforeach
    </tbody>
</table>
@if($type=='pdf')
<style>
    table tr th,table tr td{
        font-size: 12px
    }
</style>
@endif