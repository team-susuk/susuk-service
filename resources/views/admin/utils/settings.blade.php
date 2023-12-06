<x-portal::layout.admin page="Settings" type="">
    <div class="row">
        <div class="col-sm-6">
            <section class="app-content shadow-sm pb-2">
                <form action="{{ route('admin.settings.store') }}" method="post">
                    @csrf
                    <h6>
                        <b>Rekening</b>
                    </h6>
                    <x-portal::input type="text" name="rekening_bank" label="Nama Bank"
                        placeholder="Nama Bank">
                        {{ @$setting->rekening_bank }}
                    </x-portal::input>
                    <x-portal::input type="text" name="rekening_name" label="Nama Rekening"
                        placeholder="Nama Rekening">
                        {{ @$setting->rekening_name }}
                    </x-portal::input>
                    <x-portal::input type="number" name="rekening_number" label="Nomor Rekening"
                        placeholder="Nomor Rekening">
                        {{ @$setting->rekening_number }}
                    </x-portal::input>
                    <br>
                    <h6>
                        <b>Contact</b>
                    </h6>
                    <x-portal::input type="number" name="whatsapp"
                        label="Whatsapp Number" placeholder="Whatsapp Number">
                        {{ @$setting->whatsapp }}
                    </x-portal::input>

                    <button type="submit" class="btn btn-dark text-upper">
                        @lang('adminportal.save')
                    </button>
                    <br>
                </form>
            </section>
        </div>
    </div>
</x-portal::layout.admin>
