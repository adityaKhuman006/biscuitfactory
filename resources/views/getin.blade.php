@include('dashboard')

<div class="d-flex w-100 vh-100 flex-column justify-content-center align-items-center flex-wrap">
    <div>
        <a type="button" class="btn btn-lg btn-success fw-bolder text-white" href="{{ route('rawmaterial.in') }}"><img
                class="mr-2" src="{{ asset('assets/images/icone/mixing.png') }}" alt="">Raw Material</a>
    </div>
    <div class="mt-3">
        <a type="button" class="btn ms-3 btn-lg btn-success fw-bolder text-white"
            href="{{ route('packingmaterial.in') }}"><img class="mr-2"
                src="{{ asset('assets/images/icone/mixing.png') }}" alt="">Packing Material</a>
    </div>
    <div class="mt-3">
        <a type="button" class="btn ms-3 btn-lg btn-success fw-bolder text-white"
            href="{{ route('machineryitems.in') }}"><img class="mr-2"
                src="{{ asset('assets/images/icone/mixing.png') }}" alt="">Machinery Items</a>
    </div>
    <div class="mt-3">
        <a type="button" class="btn ms-3 btn-lg btn-success fw-bolder text-white"
            href="{{ route('finishedgood-in') }}"><img class="mr-2" src="{{ asset('assets/images/icone/mixing.png') }}"
                alt="">Finished Goods</a>
    </div>
</div>
@include('footer')
</body>

</html>