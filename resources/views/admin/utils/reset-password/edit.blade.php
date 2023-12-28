<div class="col-sm-7">
    <div class="form-group row ">
        <label for="" class="label fw-bold col-sm-4">Nama</label>
        <div class="col-sm-8 fs-14">
            {{-- {{ $row->role === 'users' ? $row->user_name : $row->merchant_name }} --}}
            {{$row->name}}
        </div>
    </div>
    <div class="form-group row ">
        <label for="" class="label fw-bold col-sm-4">Phone Number</label>
        <div class="col-sm-8 fs-14">
            {{ $row->phone_number }}
        </div>
    </div>
    <div class="form-group row ">
        <label for="" class="label fw-bold col-sm-4">Request At</label>
        <div class="col-sm-8 fs-14">
            {{ $row->request_at }}
        </div>
    </div>
    <div class="form-group row ">
        <label for="" class="label fw-bold col-sm-4">Update New Password</label>
        <div class="col-sm-8 fs-14">
            <input type="password" name="password" placeholder="New Password" required="required" id="password"
                class="form-control">
        </div>
    </div>

</div>
