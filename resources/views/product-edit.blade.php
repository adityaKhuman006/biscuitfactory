@include('dashboard')
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add </h4>

                        <!-- Show the form to add a product if no products exist -->
                        <form method="POST" action="{{ route('product.update') }}">
                            @csrf
                            @if ($materials->isNotEmpty())
                                @php
                                    $item = $materials->first(); // Only one product is allowed, get the first one
                                @endphp
                                <div id="product-list" class="mt-5">
                                    <div class="product-item">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" name="product_name"
                                                        value="{{ $product->product_name }}"
                                                        class="form-control form-control-sm border-black"
                                                        placeholder="Product Name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Batch Size</label>
                                                    <input type="number" name="batch_size"
                                                        value="{{ $product->batch_size }}"
                                                        class="form-control form-control-sm border-black"
                                                        placeholder="Batch Size">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Batch Required</label>
                                                    <input type="number" name="batch_required"
                                                        value="{{ $product->batch_required }}"
                                                        class="form-control form-control-sm border-black"
                                                        placeholder="Batch Required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @endif

                            <hr>

                            @if (isset($materials))
                                @foreach ($materials as $material)
                                    <div data-repeater-list="category-group mt-5">
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Item Name</label>
                                                        <input type="text" name="item_name[]"
                                                            value="{{ $material->item_name }}"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Item Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Recipe Weight</label>
                                                        <input type="number" name="recipie_weight[]"
                                                            value="{{ $material->recipie_weight }}"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Recipe Weight">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>UDM</label>
                                                        <input type="text" name="umd[]"
                                                            value="{{ $material->umd }}"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="UDM">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="material_id[]" value="{{ $material->id }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="repeater">
                                <div data-repeater-list="category-group">
                                    <div id="show_item">
                                        <div class="row" data-repeater-item>
                                            <div class="col-md-3  ">
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
</div>
</div>
<!-- partial:partials/_footer.html -->
@include('footer')
</body>

</html>
