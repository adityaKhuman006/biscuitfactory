<div class="card">
    <div class="card-body p-2">
        <div class="table-responsive">

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
                    <td>{{ $batchNumber }}</td>
                    <td>{{ $product->batch_required }}</td>
                    <td>{{ date('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::now()->format('h:i:s a') }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="{{ route('production.add') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="batch_number" value="{{ $batchNumber }}">
    <input type="hidden" name="date" value="{{ date('d M Y') }}">
    <input type="hidden" name="time" value="{{ \Carbon\Carbon::now()->format('h:i:s a') }}">
    <div class="row">
        <div class="col-lg-12 pt-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Recipie Weight</th>
                                <th>UMD</th>
                                <th>Actual Weight</th>
                            </tr>
                            <tbody>
                            @foreach ($materials as $key => $item)
                                <tr>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->recipie_weight }}</td>
                                    <td>{{ $item->umd }}</td>
                                    <td>
                                        <input type="hidden" name="material_id[]"
                                               value="{{ $item->id }}" id="">
                                        <input type="number" style="width: 100px;"
                                               name="actual_weight_{{ $item->id }}"
                                               class="form-control form-control-sm border-primary" placeholder="Weight">
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
