<x-portal::layout.blank page="{{ __('adminportal.login') }}">
    <div class="h-100 d-flex m-0 auth-screen justify-content-center align-items-center">
        <div style="max-width: 450px;width: 100%;">
            <form action="{{ url(portalconfig('login.url')) }}" method="post" class="content">
                @csrf
               <center>
                    <img src="{{ asset('admin/img/logo-blue.png') }}" alt="" width="170px" class="mb-4">
               </center>
                <x-portal::input type="email" label="{{ __('adminportal.email') }}" name="email"
                    placeholder="your@email.com">{{ old('email') }}</x-portal::input>
                <x-portal::input.password label="{{ __('adminportal.password') }}" name="password"
                    placeholder="Password"></x-portal::input.password>
                <button type="submit"
                    class="btn btn-dark w-100 btn-block justify-content-center text-upper mb-3 mt-4">@lang('adminportal.login')</button>
              
            </form>
        </div>
    </div>
</x-portal::layout.blank>
