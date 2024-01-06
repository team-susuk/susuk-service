<x-portal::input type="text" name="name" label="Name" placeholder="Name"
    horizontal>{{ $row->name }}</x-portal::input>
<x-portal::input type="text" name="description" label="Description" placeholder="Description"
    horizontal>{{ $row->description }}</x-portal::input>
<x-portal::input.select name="type" label="Type" horizontal class="select-input">
    <option value="">Pilih Type</option>
    @foreach ($price_types as $type)
        <option @selected($row->type->value === $type->value) value="{{ $type->value }}">{{ $type->label()  }}</option>
    @endforeach
</x-portal::input.select>
<x-portal::input type="text" name="price" label="Price" placeholder="Price"
    horizontal>{{ $row->price }}</x-portal::input>
<div class="form-group row ">
    <label for="" class="label col-sm-2">
        Discount
        <span class="required">*</span>
    </label>
    <div class="col-sm-6 d-flex gap-2">
        <input type="number" name="discount"placeholder="Discount" horizontal="horizontal" required="required"
            id="discount" class="form-control " value="{{ $row->discount }}">
        <select name="discount_type" id="discount_type" class="form-control wide nice-select2 select-input"
            required="" style="width: 30%">
            <option @selected($row->discount_type == 'nominal') value="nominal">Nominal</option>
            <option @selected($row->discount_type == 'percent') value="percent">Percent</option>
        </select>
    </div>
</div>

<x-portal::input.select name="benefit_period" label="Benefit Period" horizontal class="select-input">
    <option @selected($row->benefit_value) value="period">Period</option>
    <option @selected(!$row->benefit_value) value="lifetime">Lifetime</option>
</x-portal::input.select>
<div class="form-group row d-none" id="group_benefit">
    <label for="" class="label col-sm-2">
        Benefit
        <span class="required">*</span>
    </label>
    <div class="col-sm-6 d-flex gap-2">
        <input type="number" name="benefit_value" label="Benefit" placeholder="Benefit" horizontal="horizontal"
            required="required" id="benefit_value" class="form-control " value="{{ $row->benefit_value }}">
        <select name="benefit_type" id="benefit_type" class="form-control wide nice-select2 select-input" required=""
            style="width: 30%">
            <option @selected($row->benefit_type == 'day') value="day">Hari</option>
            <option @selected($row->benefit_type == 'month') value="month">Bulan</option>
            <option @selected($row->benefit_type == 'product') value="product">Product</option>
        </select>
    </div>
</div>
@push('js')
    <script>
        const benefitPeriodValue = "{{$row->benefit_value ? 'period' : 'lifetime'}}"
    </script>
    <script src="{{asset('admin/js/price-config.js')}}"></script>
@endpush