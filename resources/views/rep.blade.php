@include('dashboard')

<!-- <h1 class="text-center">report</h1> -->
<div class="main-panel ">
    <div class="content-wrapper p-2">
        <div class="card">
            <div class="container p-2">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-start">Batch No</th>
                            <th>Status</th>
                            <th>date</th>
                            <th>time</th>
                            <th>Meda</th>
                            <th>Gud</th>
                            <th>Gee</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">1</td>
                            <td>Production</td>
                            <td>2011-04-25</td>
                            <td>2.22.23</td>
                            <td>100</td>
                            <td>50</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td class="text-start">2</td>
                            <td>LOD Reuse</td>
                            <td>2011-04-25</td>
                            <td>9.5.23</td>
                            <td>100</td>
                            <td>50</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td class="text-start">3</td>
                            <td>Production</td>
                            <td>2011-04-25</td>
                            <td>6.8.6</td>
                            <td>100</td>
                            <td>50</td>
                            <td>100</td>
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
