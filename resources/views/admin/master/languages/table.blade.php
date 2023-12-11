@foreach ($data as $row)
<tr>
    @itcan('delete admin.languages')
    <td>
        <div class="form-checkbox">
            <input type="checkbox" class="table-checkbox" value="{{$row->uuid}}" name="selected_ids[]">
        </div>
    </td>
    @enditcan
    <td>{{$row->lang}}</td>
    <td class="text-end">
        @if(itcan('edit admin.languages') || itcan('delete admin.languages'))
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                Action
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                @itcan('edit admin.languages')
                <li>
                    <a href="{{adminRoute('admin.languages.edit',$row->uuid)}}" class="dropdown-item">Edit</a>
                </li>
                @enditcan
                @itcan('delete admin.languages')
                <li>
                    <a href="javascript:;" data-toggle="confirmation"
                        data-message="{{__('adminportal.delete_confirmation')}}"
                        data-action="{{adminRoute('admin.languages.destroy',$row->uuid)}}" data-method="DELETE"
                        class="dropdown-item">Delete</a>
                </li>
                @enditcan
            </ul>
        </div>
        @endif
    </td>
</tr>
@endforeach