{{-- @extends('layouts.master')
@section('content') --}}
@include('dashboard')
<div class="main-panel">
    <div class="content-wrapper p-2">
        <div class="row">
            <div class="col-12 p-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Product</h4>
                        <!-- Show the form to add a product if no products exist -->
                        <form method="POST" action="{{ route('product.update') }}">
                            @csrf
                            <input type="hidden" name="product-id" value="{{ $product->id }}">
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" required
                                               value="{{ $product->product_name ?? '' }}"
                                               class="form-control form-control-sm border-black"
                                               placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>Batch Size</label>
                                        <input type="number" name="batch_size" required
                                               value="{{ $product->batch_size ?? '' }}"
                                               class="form-control form-control-sm border-black"
                                               placeholder="Batch Size">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="form-group">
                                        <label>Batch Required</label>
                                        <input type="number" name="batch_required" required
                                               value="{{ $product->batch_required ?? '' }}"
                                               class="form-control form-control-sm border-black"
                                               placeholder="Batch Required">
                                    </div>
                                </div>
                            </div>
                            <div class="border border-5 m-3" style="margin-left: 0 !important;"></div>

                            <h4 class="card-title">Update items</h4>
                            @foreach($materials as $material)
                                <input type="hidden" name="material_id[]" value="{{ $material->id }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <input type="text" name="old-item_name_{{ $material->id }}" value="{{ $material->item_name ?? '' }}"
                                                       class="form-control form-control-sm border-black"
                                                       placeholder="Item Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Recipe Weight</label>
                                                <input type="number" name="old-recipie_weight_{{ $material->id }}" value="{{ $material->recipie_weight ?? '' }}"
                                                       class="form-control form-control-sm border-black"
                                                       placeholder="Recipe Weight">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>UDM</label>
                                                <input type="text" name="old-umd_{{ $material->id }}" value="{{ $material->umd ?? '' }}"
                                                       class="form-control form-control-sm border-black"
                                                       placeholder="UDM">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="repeater">
                                <div data-repeater-list="category-group">
                                    <div id="show_item">
                                        <div class="row" data-repeater-item>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Item Name</label>
                                                        <input type="text" name="item_name"
                                                               class="form-control form-control-sm border-black"
                                                               placeholder="Item Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Recipie Weight</label>
                                                        <input type="number" name="recipie_weight"
                                                               class="form-control form-control-sm border-black"
                                                               placeholder="Recipie Weight">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>UDM</label>
                                                        <input type="text" name="umd"
                                                               class="form-control form-control-sm border-black"
                                                               placeholder="UDM">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <br>
                                                        <div class="text-end">
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
        initEmpty: true,
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
