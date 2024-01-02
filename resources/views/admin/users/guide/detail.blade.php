<x-portal::layout.admin page="Detail Guide">
    <section class="app-content shadow-sm">
        <div class="header-form d-flex justify-content-between">
            <div class="left-side d-flex align-items-center">
                <h5 class="form-title">
                    Detail Guide
                </h5>
            </div>
            <div class="right-side d-flex gap-10">
                <a href="{{ route('admin.guide.index') }}" class="btn btn-light text-upper">
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
                                style="height: 100px;width: 100px;border-radius: 100%;object-fit: cover" alt="">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Nama Lengkap</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Nama Panggilan</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->nick_name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">ID Guide</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->code }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Nomor Whatsapp</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->phone_number }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Tanggal Lahir</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->birthday }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Profesi</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->profession->name }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Nomor</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->phone_number }}
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
                        <label for="" class="label fw-bold col-sm-4">Bahasa</label>
                        <div class="col-sm-8 fs-14">
                            {{ implode(' , ',$row->languages) }}
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="" class="label fw-bold col-sm-4">Waktu Registrasi</label>
                        <div class="col-sm-8 fs-14">
                            {{ $row->register_at }}
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
