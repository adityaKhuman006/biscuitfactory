@include('dashboard')

<div class="d-flex w-100 vh-100 justify-content-center align-items-center flex-wrap">
        <a type="button" class="btn btn-lg btn-success fw-bolder text-white" href="{{ route('getin') }}"><img
                        class="mr-2" src="{{ asset('assets/images/icone/mixing.png') }}" alt="">GetIn</a>
        <a type="button" class="btn ms-3 btn-lg btn-success fw-bolder text-white" href="{{ route('getout') }}"><img
                        class="mr-2" src="{{ asset('assets/images/icone/mixing.png') }}" alt="">Getout</a>
</div>
@include('footer')
</body>

</html>