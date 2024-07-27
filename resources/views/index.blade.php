@include('dashboard')

<!-- <h1 class="text-center">report</h1> -->
<div class="main-panel ">
    <div class="content-wrapper p-2">
        <div class="card">
            <div class="text-end pt-3 me-2">
                <a href="{{route('create')}}"><button type="button" class="btn btn-success">Add Product</button></a>
            </div>
            <div class="container p-2">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-start">Product Name</th>
                            <th>Batch Size</th>
                            <th>Batch Required</th>
                            <th>Item Name</th>
                            <th>Recipie Weight</th>
                            <th>UDM</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">Parle-G</td>
                            <td>100</td>
                            <td>20</td>
                            <td>Meda</td>
                            <td>100</td>
                            <td>10</td>
                            <td>
                                <!-- <div class="text-end"> -->
                                <button data-repeater-delete type="button" class=" btn btn-primary add-item">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                                <button data-repeater-delete type="button" class="btn btn-danger add-item">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                                <!-- </div> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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