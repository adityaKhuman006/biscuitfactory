@include('dashboard')

<div class="d-flex w-100 flex-column justify-content-center align-items-center flex-wrap">
    <div>
        <a type="button" class="btn btn-lg btn-success fw-bolder text-white" style="width: 200px;"
            href="{{ route('rawmaterial.in') }}"><img class="mr-4" style="width:30px;"
                src="{{ asset('assets/images/icone/processing.png') }}" alt="">Raw Material</a>
    </div>
    <div class="mt-3">
        <a type="button" class="btn btn-lg btn-success fw-bolder text-white" style="width: 200px;"
            href="{{ route('packingmaterial.in') }}"><img class="mr-3" style="width:30px;"
                src="{{ asset('assets/images/icone/material-management.png') }}" alt="">Packing Material</a>
    </div>
    <div class="mt-3">
        <a type="button" class="btn btn-lg btn-success fw-bolder text-white" style="width: 200px;"
            href="{{ route('machineryitems.in') }}"><img class="mr-3" style="width:30px;"
                src="{{ asset('assets/images/icone/cogwheel.png') }}" alt="">Machinery Items</a>
    </div>
    <div class="mt-3">
        <a type="button" class="btn btn-lg btn-success fw-bolder text-white" style="width: 200px;"
            href="{{ route('finishedgood-in') }}"><img class="mr-3" style="width:30px;"
                src="{{ asset('assets/images/icone/goods.png') }}" alt="">Finished Goods</a>
    </div>
</div>
@include('footer')
</body>

</html>