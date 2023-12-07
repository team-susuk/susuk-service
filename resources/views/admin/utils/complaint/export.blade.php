<table>
    <thead>
        <tr>
            <th>User Id</th>
            <th>User Role</th>
            <th>Title</th>
            <th>Message</th>

        </tr>
    </thead>
    <tbody>
    @foreach ($data as $row)
    <tr>
                    <td>{{$row->user_id}}</td>
            <td>{{$row->user_role}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->message}}</td>

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