{{-- @extends('layouts.master')
@section('content') --}}
@include('dashboard')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h3 class="fw-bold mb-4">Master Product</h3>
            <div class="card p-2">
                <div class="col-12">
                    <table class="table table-hover tab-pane">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Type</th>
                            <th>UOM</th>
                            <th>Packing</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($items as $key => $item)
                            <tr class="removeble-tr-{{ $item->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <input type="text" class="border-0 update-name" data-id='{{ $item->id }}'
                                        value="{{ $item->product_name }}">
                                </td>
                                <td>
                                    <input type="text" class="border-0 update-type" data-id='{{ $item->id }}'
                                        value=" {{ $item->type }}">
                                </td>
                                <td>
                                    <input type="text" class="border-0 update-uom" data-id='{{ $item->id }}'
                                        value=" {{ $item->uom }}">
                                </td>
                                <td>
                                    <input type="text" class="border-0 update-packing" data-id='{{ $item->id }}'
                                        value=" {{ $item->packing }}">
                                </td>
                                <td>
                                    <input type="text" class="border-0 update-remark" data-id='{{ $item->id }}'
                                        value=" {{ $item->remark }}">
                                </td>
                                <td>
                                    <button type="button" delete-id ='{{ $item->id }}'
                                        class="btn btn-danger add-item delete-items" style="padding:4px 5px 3px 5px;"><i
                                            class="fs-5 text-white mdi mdi-delete"></i></button>
                                </td>
                        @endforeach
                        </tr>
                    </table>

                    <div class="card-body pt-10 mt-5">
                        <form method="POST" action="{{ route('product.master.create') }}">
                            @csrf
                            <!-- <div class="border border-5 m-3" style="margin-left: 0 !important;"></div> -->
                            <div class="repeater">
                                <div data-repeater-list="category-group">
                                    <h4 class="card-title">Add items</h4>
                                    <div id="show_item">
                                        <div class="row mt-3" data-repeater-item>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Product Name</label>
                                                        <input type="text" name="product_name"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Product Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-6">
                                                <label>Type</label>
                                                <select name="type"
                                                    class="form-select form-control-sm border-dark mt-1" id="">
                                                    <option>Raw Material</option>
                                                    <option>Packing Material</option>
                                                    <option>Machenery parts</option>
                                                    <option>finished Good</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>UOM</label>
                                                        <input type="text" name="uom"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="UOM">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Packing</label>
                                                        <input type="text" name="packing"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Packing">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Remark</label>
                                                        <input type="text" name="remark"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Remark">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <!-- <br> -->
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

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                <button type="button" id="deleteItem" class="btn btn-danger text-white">Delete</button>
            </div>
        </div>
    </div>
</div>

@include('footer')
<script src="{{ asset('assets/js/repeater.min.js') }}"></script>
<script src="{{ asset('assets/js/notify.min.js') }}"></script>

<script>
    $('.repeater').repeater({
        defaultValues: {
            'text-input': 'foo'
        },
        show: function() {
            $(this).slideDown();
        },
        hide: function(deleteElement) {
            $(this).slideUp(deleteElement);
        },
        isFirstItemUndeletable: true
    });


    $(document).ready(function() {
        $(".update-name").change(function() {
            var product_name = $(this).val();
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('update.product.name') }}',
                method: 'POST',
                data: {
                    id: id,
                    product_name: product_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $.notify("Name updated", "success");
                },
                error: function(response) {
                    alert(response);
                }
            })
        })

        $(".update-type").change(function() {
            var type = $(this).val();
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('update.type') }}',
                method: 'POST',
                data: {
                    id: id,
                    type: type,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $.notify("Type updated", "success");
                },
                error: function(response) {
                    alert(response);
                }
            })
        })

        $(".update-uom").change(function() {
            var uom = $(this).val();
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('update.uom') }}',
                method: 'POST',
                data: {
                    id: id,
                    uom: uom,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $.notify("UOM updated", "success");
                },
                error: function(response) {
                    alert(response);
                }
            })
        })

        $(".update-packing").change(function() {
            var packing = $(this).val();
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('update.packing') }}',
                method: 'POST',
                data: {
                    id: id,
                    packing: packing,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $.notify("Packing updated", "success");
                },
                error: function(response) {
                    alert(response);
                }
            })
        })

        $(".update-remark").change(function() {
            var remark = $(this).val();
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('update.remark') }}',
                method: 'POST',
                data: {
                    id: id,
                    remark: remark,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $.notify("Remark updated", "success");
                },
                error: function(response) {
                    alert(response);
                }
            })
        })
    })

    $("#deleteItem").click(function (){
        $("#loader").show();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '{{ route('delete.product') }}',
            method: 'POST',
            data: {
                id: id,
                _token : '{{ csrf_token() }}'
            }, success: function (response) {
                $.notify("product deleted", "error");
                $("#loader").hide();
                $("#deleteModal").modal('hide');
                $(".removeble-tr-"+id).fadeOut();
            }, error: function (response) {
                alert(response);
            }
        })
    })


    $(".delete-items").click(function (){
        var id = $(this).attr('delete-id');
        $("#deleteItem").attr('data-id',id)
        $("#deleteModal").modal('show');
    })

</script>
<!-- partial:partials/_footer.html -->
</body>

</html>
{{-- @endsection --}}
