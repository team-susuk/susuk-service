<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Profile</th>
            <th>Description</th>
            <th>Category Id</th>
            <th>Province Id</th>
            <th>City Id</th>
            <th>Subdistrict Id</th>
            <th>Address</th>
            <th>Pic Name</th>
            <th>Phone Number</th>
            <th>Whatsapp Number</th>
            <th>Commission</th>
            <th>Weekdays</th>
            <th>Weekday Time</th>
            <th>Weekends</th>
            <th>Weekend Time</th>
            <th>Sip Document</th>
            <th>Viewer</th>
            <th>Is Member</th>
            <th>Expired Member_at</th>
            <th>Password</th>
            <th>Deleted At</th>
            <th>Code</th>

        </tr>
    </thead>
    <tbody>
    @foreach ($data as $row)
    <tr>
                    <td>{{$row->name}}</td>
            <td>{{$row->profile}}</td>
            <td>{{$row->description}}</td>
            <td>{{$row->category_id}}</td>
            <td>{{$row->province_id}}</td>
            <td>{{$row->city_id}}</td>
            <td>{{$row->subdistrict_id}}</td>
            <td>{{$row->address}}</td>
            <td>{{$row->pic_name}}</td>
            <td>{{$row->phone_number}}</td>
            <td>{{$row->whatsapp_number}}</td>
            <td>{{$row->commission}}</td>
            <td>{{$row->weekdays}}</td>
            <td>{{$row->weekday_time}}</td>
            <td>{{$row->weekends}}</td>
            <td>{{$row->weekend_time}}</td>
            <td>{{$row->sip_document}}</td>
            <td>{{$row->viewer}}</td>
            <td>{{$row->is_member}}</td>
            <td>{{$row->expired_member_at}}</td>
            <td>{{$row->password}}</td>
            <td>{{$row->deleted_at}}</td>
            <td>{{$row->code}}</td>

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