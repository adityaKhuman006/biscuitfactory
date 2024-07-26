@include('dashboard')

<!-- <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Striped Table</h4>
            <p class="card-description">
                Add class <code>.table-striped</code>
            </p>
            <div class="table-responsive">
                <table class="table w-75 table-striped">
                    <thead>
                        <tr>
                            <th>
                                Item
                            </th>
                            <th>
                                Recipie Weight(kg)
                            </th>
                            <th>
                                UMO
                            </th>
                            <th>
                                Actual Weight
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-1">
                                Meda
                            </td>
                            <td>
                                100
                            </td>
                            <td>
                                umo
                            </td>
                            <td>
                                <input type="number" name="recipie_weight" required
                                    class="form-control w-50 form-control-sm border-black" placeholder="Recipie Weight">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">update </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1">
                                Meda
                            </td>
                            <td>
                                100
                            </td>
                            <td>
                                umo
                            </td>
                            <td>
                                <input type="number" name="recipie_weight" required
                                    class="form-control w-50 form-control-sm border-black" placeholder="Recipie Weight">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">update </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1">
                                Meda
                            </td>
                            <td>
                                100
                            </td>
                            <td>
                                umo
                            </td>
                            <td>
                                <input type="number" name="recipie_weight" required
                                    class="form-control w-50 form-control-sm border-black" placeholder="Recipie Weight">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">update </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1">
                                Meda
                            </td>
                            <td>
                                100
                            </td>
                            <td>
                                umo
                            </td>
                            <td>
                                <input type="number" name="recipie_weight" required
                                    class="form-control w-50 form-control-sm border-black" placeholder="Recipie Weight">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">update </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

<div class="main-panel ">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleFormControlSelect3">Product</label>
                    <select class="form-select form-control-sm border-dark" id="exampleFormControlSelect3">
                        <option>Parle-G</option>
                        <option>Moneko</option>
                        <option>Oreo</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="form-group">
                        <label>Batch Required</label>
                        <input type="number" name="recipie_weight" required value="50"
                            class="form-control form-control-sm border-black" placeholder="Recipie Weight">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="form-group">
                        <label>Batch No</label>
                        <input type="number" name="Batch No" required value="0"
                            class="form-control form-control-sm border-black" placeholder="Batch No">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="Batch No" required value="0"
                            class="form-control form-control-sm border-black" placeholder="Date">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" name="Batch No" required value="0"
                            class="form-control form-control-sm border-black" placeholder="Time">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleFormControlSelect3">Batch Size</label>
                    <select class="form-select form-control-sm border-dark" id="exampleFormControlSelect3">
                        <option>100</option>
                        <option>150</option>
                        <option>200</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-dark">Item</th>
                                        <th class="border-dark">Recipie Weight</th>
                                        <th class="border-dark">UOM</th>
                                        <th class="border-dark">Actual Weight</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>meda</td>
                                        <td>100</td>
                                        <td>12 May 2017</td>
                                        <td>
                                            <input type="number" style="width: 100px;" name="recipie_weight" required
                                                class="form-control form-control-sm border-black" placeholder="Weight">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <div class="text-center">
                <button type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#exampleModalCenter">Save</button>
            </div>
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Launch demo modal
            </button> -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                id="optionsRadios1" value="">
                                            Preduction
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                id="optionsRadios1" value="">
                                            LOD Reuse
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                id="optionsRadios1" value="">
                                            Scrap
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- partial -->
    <!-- <div class="main-panel ">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add </h4>
                        @if (isset($materials))
                            @foreach ($materials as $material)
                                <div data-repeater-list="category-group mt-5">
                                    <div id="show_item">
                                        <div class="row" data-repeater-item>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Item Name</label>
                                                        <input type="text" name="item_name" value="{{ $material->item_name }}"
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
                                                            value="{{ $material->recipie_weight }}"
                                                            class="form-control form-control-sm border-black"
                                                            placeholder="Recipie Weight">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>UDM</label>
                                                        <input type="text" name="umd" value="{{ $material->umd }}"
                                                            class="form-control form-control-sm border-black" placeholder="UDM">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Actual Weight</label>
                                                        <input type="number" name="umd" 
                                                            class="form-control form-control-sm border-black" placeholder="Actual Weight">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="text-center">
                        <button type="button" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
    @include('footer')
</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script> -->

</html>