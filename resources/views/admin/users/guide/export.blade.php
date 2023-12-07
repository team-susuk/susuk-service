<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Nick Name</th>
            <th>Birthday</th>
            <th>Phone Number</th>
            <th>Profile</th>
            <th>Profession Id</th>
            <th>Languages</th>
            <th>Password</th>
            <th>Status</th>
            <th>Register At</th>
            <th>Verification At</th>
            <th>Deleted At</th>
            <th>Code</th>
            <th>Is Member</th>
            <th>Expired Member_at</th>

        </tr>
    </thead>
    <tbody>
    @foreach ($data as $row)
    <tr>
                    <td>{{$row->name}}</td>
            <td>{{$row->nick_name}}</td>
            <td>{{$row->birthday}}</td>
            <td>{{$row->phone_number}}</td>
            <td>{{$row->profile}}</td>
            <td>{{$row->profession_id}}</td>
            <td>{{$row->languages}}</td>
            <td>{{$row->password}}</td>
            <td>{{$row->status}}</td>
            <td>{{$row->register_at}}</td>
            <td>{{$row->verification_at}}</td>
            <td>{{$row->deleted_at}}</td>
            <td>{{$row->code}}</td>
            <td>{{$row->is_member}}</td>
            <td>{{$row->expired_member_at}}</td>

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