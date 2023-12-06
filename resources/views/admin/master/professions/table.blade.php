@foreach ($data as $row)
<tr>
    @itcan('delete admin.professions')
    <td>
        <div class="form-checkbox">
            <input type="checkbox" class="table-checkbox" value="{{$row->uuid}}" name="selected_ids[]">
        </div>
    </td>
    @enditcan
    <td>{{$row->name}}</td>
    <td class="text-end">
        @if(itcan('edit admin.professions') || itcan('delete admin.professions'))
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                Action
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                @itcan('edit admin.professions')
                <li>
                    <a href="{{adminRoute('admin.professions.edit',$row->uuid)}}" class="dropdown-item">Edit</a>
                </li>
                @enditcan
                @itcan('delete admin.professions')
                <li>
                    <a href="javascript:;" data-toggle="confirmation"
                        data-message="{{__('adminportal.delete_confirmation')}}"
                        data-action="{{adminRoute('admin.professions.destroy',$row->uuid)}}" data-method="DELETE"
                        class="dropdown-item">Delete</a>
                </li>
                @enditcan
            </ul>
        </div>
        @endif
    </td>
</tr>
@endforeach