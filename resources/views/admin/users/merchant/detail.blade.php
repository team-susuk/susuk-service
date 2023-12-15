<x-portal::layout.admin page="Detail Merchant">
    <section class="app-content shadow-sm">
        <div class="header-form d-flex justify-content-between">
            <div class="left-side d-flex align-items-center">
                <h5 class="form-title">
                    Detail Merchant
                </h5>
            </div>
            <div class="right-side d-flex gap-10">
                <a href="{{ route('admin.merchant.index') }}" class="btn btn-light text-upper">
                    @lang('adminportal.back')
                </a>
            </div>
        </div>

        <div class="form-content pb-4">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group row ">
                        <label for="" class="label fw-bold  col-sm-4">Foto</label>
                        <div class="col-sm-8 fs-14">
                            <img src="{{ asset($row->profile) }}" class=""
                                style="height: 100px;width: 200px;border-radius: 10px;object-fit: cover" alt="">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Nama Toko</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Description </label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->description }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Kategori Toko</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->category?->name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Provinsi </label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->province?->name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Kabupaten/kotamadya</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->city?->name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Kecamatan </label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->subdistrict?->name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Alamat Toko</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->address }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Nama PIC</label>
                        <div class="col-sm-8 fs-14">
                         {{ $row->pic_name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Phone Number</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->phone_number }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Whatsapp Number  </label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->whatsapp_number }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Range Komisi (%) </label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->commission['start'] }}% - {{ $row->commission['end'] }}%
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Weekdays </label>
                        <div class="col-sm-8 fs-14">
                            {{ implode(' , ',$row->weekdays) }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Waktu Weekdays </label>
                        <div class="col-sm-8 fs-14">
                         {{ $row->weekday_time['start'] }} - {{ $row->weekday_time['end'] }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Weekends </label>
                        <div class="col-sm-8 fs-14">
                            {{ implode(' , ',$row->weekends) }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Waktu Weekends </label>
                        <div class="col-sm-8 fs-14">
                         {{ $row->weekend_time['start'] }} - {{ $row->weekend_time['end'] }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">SIUP Document </label>
                        <div class="col-sm-8 fs-14">
                            <a href="{{ asset($row->siup_document) }}" target="_blank">Lihat File</a>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Status</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->status->label() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>
</x-portal::layout.admin>
