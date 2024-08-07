@include('dashboard')

<!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/4.0.1/css/fixedHeader.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css"> -->


<div class="main-panel ">
    <div class="content-wrapper p-2">
        <div class="card">
            <h2 class="p-2">Get-Out-Report</h2>
            <div class="container p-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Items</label>
                            <select class="form-select form-control-sm border-dark" id="batchSizeSelect">
                                <option>raw-material</option>
                                <option>Packing Material</option>
                                <option>machinery items</option>
                                <option>finish good</option>
                                <!-- Batch sizes will be populated dynamically -->
                            </select>
                        </div>
                    </div>
                </div>
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Compaey Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>From</th>
                            <th>INV/Challan Number</th>
                            <th>INV/Challan Date</th>
                            <th>Vehicle Number</th>
                            <th>Mobail</th>
                            <th>Image</th>
                            <th>Items</th>
                            <th>Quantity</th>
                            <th>UOM</th>
                            <th>Rate</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Compaey Name</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>From</td>
                            <td>INV/Challan Number</td>
                            <td>INV/Challan Date</td>
                            <td>Vehicle Number</td>
                            <td>Mobail</td>
                            <td>Image</td>
                            <td>Items</td>
                            <td>Quantity</td>
                            <td>UOM</td>
                            <td>Rate</td>
                            <td>Amount</td>
                        </tr>
                        <tr>
                            <td>Compaey Name</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>From</td>
                            <td>INV/Challan Number</td>
                            <td>INV/Challan Date</td>
                            <td>Vehicle Number</td>
                            <td>Mobail</td>
                            <td>Image</td>
                            <td>Items</td>
                            <td>Quantity</td>
                            <td>UOM</td>
                            <td>Rate</td>
                            <td>Amount</td>
                        </tr>
                        <tr>
                            <td>Compaey Name</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>From</td>
                            <td>INV/Challan Number</td>
                            <td>INV/Challan Date</td>
                            <td>Vehicle Number</td>
                            <td>Mobail</td>
                            <td>Image</td>
                            <td>Items</td>
                            <td>Quantity</td>
                            <td>UOM</td>
                            <td>Rate</td>
                            <td>Amount</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('footer')

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

<script>
    new DataTable('#example', {
        responsive: true
    });
</script>
</body>

</html>