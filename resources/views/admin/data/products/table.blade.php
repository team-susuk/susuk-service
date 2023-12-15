@foreach ($data as $row)
<tr>
    @itcan('delete admin.products')
    <td>
        <div class="form-checkbox">
            <input type="checkbox" class="table-checkbox" value="{{$row->uuid}}" name="selected_ids[]">
        </div>
    </td>
    @enditcan
    
    <td>
        <img src="{{ asset($row->image) }}" alt="" class="img-thumbnail img-table" style="height: 40px !important;">
        {{$row->name}}
    </td>
    <td>{{$row->merchant?->name}}</td>
    <td>{{$row->description}}</td>
    <td>{{number_format($row->price)}}</td>
    <td>{{$row->commission}}%</td>
    <td>{{$row->viewer}}</td>
    <td class="text-end">
        @if(itcan('edit admin.products') || itcan('delete admin.products'))
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                Action
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-action">
                @itcan('edit admin.products')
                <li>
                    <a href="{{adminRoute('admin.products.edit',$row->uuid)}}" class="dropdown-item">Edit</a>
                </li>
                @enditcan
                @itcan('delete admin.products')
                <li>
                    <a href="javascript:;" data-toggle="confirmation"
                        data-message="{{__('adminportal.delete_confirmation')}}"
                        data-action="{{adminRoute('admin.products.destroy',$row->uuid)}}" data-method="DELETE"
                        class="dropdown-item">Delete</a>
                </li>
                @enditcan
            </ul>
        </div>
        @endif
    </td>
</tr>
@endforeach
@push('js')
    <script>
        document.querySelector('#modal-export-data .form-group:nth-child(2)').remove()
        document.querySelector('#modal-export-data .modal-body').insertAdjacentHTML('beforeend','<input type="hidden" name="file_format" value="xlsx"/>')
    </script>
@endpush