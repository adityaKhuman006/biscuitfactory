@include('dashboard')

<!-- <h1 class="text-center">report</h1> -->
<div class="main-panel ">
    <div class="content-wrapper p-2">
        <div class="card">
            <div class="container p-2">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-start">Product Name</th>
                        <th class="text-start">Batch No</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($batches as $batch)
                        <tr>
                            <th class="text-start">{{ $batch->getProduct[0]->product_name}}</th>
                            <td class="text-start">{{ $batch->batch_number - 1 }}</td>
                            <td>Production</td>
                            <td>{{ $batch->date}}</td>
                            <td>{{ $batch->time}}</td>
                            <td>
                                <button data-product-id="{{$batch->getProduct[0]->id}}" data-batch-id="{{$batch->batch_number}}" class="btn btn-outline-primary fw-bolder viewReport"><i class="mdi mdi-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="viewReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Report</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="reportData">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

    $(document).on('click','.viewReport',function (){
        $("#loader").show();
        var batchId =  $(this).attr('data-batch-id');
        var productId =  $(this).attr('data-product-id');
        $.ajax({
            url:'{{ route('get.material') }}',
            method:'POST',
            data:{
                _token: '{{ csrf_token() }}',
                productId:productId,
                batchId:batchId
            },
            success : function (response){
                if(response.html){
                    $("#reportData").html(response.html)
                    $("#viewReportModal").modal('show')
                    $("#loader").hide();
                }
            },error : function (response){
                console.log(response)
            }
        })
    })
</script>
</body>

</html>
