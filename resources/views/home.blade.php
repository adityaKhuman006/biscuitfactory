@include('dashboard')
<div class="d-flex w-100 vh-100 justify-content-center align-items-center flex-wrap">
        <a type="button" class="btn btn-lg btn-success fw-bolder text-white" href="{{ route('select.category') }}"><img
                        class="mr-2" src="{{ asset('assets/images/icone/mixing.png') }}" alt="">Mixing</a>
        <a type="button" class="btn ms-3 btn-lg btn-success fw-bolder text-white" href="{{ route('security') }}"><img
                        class="mr-2" src="{{ asset('assets/images/icone/mixing.png') }}" alt="">Security</a>
</div>
@include('footer')
