{{-- @extends('layouts.master')
@section('content') --}}
@include('dashboard')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="card p-2">
                <div class="col-12">
                    <div class="card-body pt-10 ">
                        <h4 class="card-title">Inward Machinery Items</h4>
                        <!-- Show the form to add a product if no products exist -->
                        <form method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="Date" name="Date" required
                                            class="form-control form-control-sm border-black"
                                            placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input type="time" name="Time" required
                                            class="form-control form-control-sm border-black" placeholder="Batch Size">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <label>Compaey Name</label>
                                    <select class="form-select form-control-sm border-dark mt-1" id="">
                                        <option>wepro</option>
                                        <option>wepro</option>
                                        <option>wepro</option>
                                        <option>wepro</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="Time" required
                                            class="form-control form-control-sm border-black" placeholder="Location">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>INV/Challan Number</label>
                                        <input type="number" name="batch_required" required
                                            class="form-control form-control-sm border-black"
                                            placeholder="INV/Challan Number ">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>INV/Challan Date</label>
                                        <input type="Date" name="batch_required" required
                                            class="form-control form-control-sm border-black"
                                            placeholder="INV/Challan Date">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>Vehicle Number</label>
                                        <input type="number" name="batch_required" required
                                            class="form-control form-control-sm border-black"
                                            placeholder="Truck Number">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>Mobail</label>
                                        <input type="number" name="batch_required" required
                                            class="form-control form-control-sm border-black" placeholder="Mobail">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6"></div>
                                <div class="col-lg-3 col-6"></div>
                            </div>

                            <!-- <div class="border border-5 m-3" style="margin-left: 0 !important;"></div> -->

                            <div class="repeater">
                                <div data-repeater-list="category-group">
                                    <h4 class="card-title">Add items</h4>
                                    <div>
                                        <input type="file">
                                    </div>
                                    <div id="show_item">
                                        <div class="row mt-3" data-repeater-item>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Items</label>
                                                        <select class="form-select form-control-sm border-dark"
                                                            id="batchSizeSelect">
                                                            <option>Meda</option>
                                                            <option>Meda</option>
                                                            <option>Meda</option>
                                                            <option>Meda</option>
                                                            <!-- Batch sizes will be populated dynamically -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input type="number" name="recipie_weight"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Quantity">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>UOM</label>
                                                        <input type="text" name="umd"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="UOM">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Rate</label>
                                                        <input type="number " name="umd"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Rate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input type="nunmber" name="umd"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <br>
                                                        <div class="text-end mt-2">
                                                            <button data-repeater-delete type="button"
                                                                class="btn btn-danger add-item"><i
                                                                    class=" mdi mdi-delete"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    </button>
                                    <button data-repeater-create type="button" class="btn btn-success add-item"
                                        style="margin-top: 15px;"><i class="mdi mdi-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
<script src="{{ asset('assets/js/repeater.min.js') }}"></script>
<script>
    $('.repeater').repeater({
        defaultValues: {
            'text-input': 'foo'
        },
        show: function () { 
            $(this).slideDown();
        },
        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        },
        isFirstItemUndeletable: true
    });
</script>
<!-- partial:partials/_footer.html -->
</body>

</html>
{{-- @endsection --}}