@include('dashboard')



<div class="main-panel ">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6 col-xl-2 col-6">
                <div class="form-group">
                    <label for="productSelect">Product</label>
                    <select class="form-select form-control-sm border-dark" id="productSelect">
                        <option disabled selected>Select Product</option>
                        @foreach ($product as $item)
                            <option value="{{ $item->id }}" data-batch-size="{{ $item->batch_size }}">
                                {{ $item->product_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-xl-2 col-6">
                <div class="form-group">
                    <label for="batchSizeSelect">Batch Size</label>
                    <select class="form-select form-control-sm border-dark" id="batchSizeSelect">
                        <option disabled selected>Select Batch Size</option>
                        <!-- Batch sizes will be populated dynamically -->
                    </select>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-body p-2">
                <div class="table-responsive"></div>
                <table class="table border-none">
                    <thead>
                        <tr>
                            <th class="border-dark">Batch No</th>
                            <th class="border-dark">Batch Required</th>
                            <th class="border-dark">Date</th>
                            <th class="border-dark">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10</td>
                            <td>150</td>
                            <td>12 May 2017</td>
                            <td>2.20.200</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{ route('production.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12 pt-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <!-- <th>NO.</th> -->
                                        <th>Item</th>
                                        <th>Recipie Weight</th>
                                        <th>UMD</th>
                                        <th>Actual Weight</th>
                                    </tr>
                                    <tbody>
                                        @foreach ($materials as $key => $item)
                                            <tr>
                                                <!-- <td>{{ $key + 1 }}</td> -->
                                                <td>{{ $item->item_name }}</td>
                                                <td>{{ $item->recipie_weight }}</td>
                                                <td>{{ $item->umd }}</td>
                                                <td>
                                                    <input type="hidden" name="prodect_id[]"
                                                        value="{{ $item->id }}" id="">
                                                    <input type="number" style="width: 100px;"
                                                        name="actual_weight_{{ $item->id }}"
                                                        class="form-control form-control-sm border-primary"
                                                        value="{{ $item->actual_weight }}" placeholder="Weight">
                                                    <!-- Add more fields if needed, ensure names are indexed for array input -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
        </form>
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

<!-- @include('footer') -->
</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('productSelect');
        const batchSizeSelect = document.getElementById('batchSizeSelect');

        productSelect.addEventListener('change', function() {
            // Clear the current batch size options
            batchSizeSelect.innerHTML = '<option disabled selected>Select Batch Size</option>';

            // Get the selected product's batch size
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const batchSize = selectedOption.getAttribute('data-batch-size');

            if (batchSize) {
                // Create a new option element for the batch size
                const option = document.createElement('option');
                option.value = batchSize;
                option.textContent = batchSize;
                batchSizeSelect.appendChild(option);

                // Optionally, select the new batch size if it matches any existing option
                batchSizeSelect.value = batchSize;
            }
        });
    });
</script>
<!-- <script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script> -->

</html>