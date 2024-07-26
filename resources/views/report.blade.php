<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive DataTable</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.1/css/responsive.dataTables.min.css">
    <!-- Bootstrap CSS (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-size: 16px;
            padding: 20px;
        }

        table.dataTable {
            width: 100%;
        }

        /* Hide the table and show the button on mobile screens */
        @media (max-width: 768px) {
            .data-table-wrapper {
                display: none;
            }

            .show-table-button {
                display: block;
                margin: 20px auto;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                border: none;
                background-color: #007bff;
                color: #fff;
                border-radius: 5px;
            }
        }

        /* Default button style for larger screens */
        .show-table-button {
            display: none;
        }
    </style>
</head>

<body>
    <h2>Responsive Table with DataTables</h2>

    <button class="show-table-button">Show Table</button>

    <div class="data-table-wrapper">
        <table id="example" class="display dt-responsive table table-bordered table-hover">
            <caption>An example of a responsive table based on <a href="https://datatables.net/extensions/responsive/"
                    target="_blank">DataTables</a></caption>
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Languages</th>
                    <th>Population</th>
                    <th>Median Age</th>
                    <th>Area (Km²)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Argentina</td>
                    <td>Spanish (official), English, Italian, German, French</td>
                    <td>41,803,125</td>
                    <td>31.3</td>
                    <td>2,780,387</td>
                </tr>
                <tr>
                    <td>Australia</td>
                    <td>English 79%, native and other languages</td>
                    <td>23,630,169</td>
                    <td>37.3</td>
                    <td>7,739,983</td>
                </tr>
                <tr>
                    <td>Greece</td>
                    <td>Greek 99% (official), English, French</td>
                    <td>11,128,404</td>
                    <td>43.2</td>
                    <td>131,956</td>
                </tr>
                <tr>
                    <td>Luxembourg</td>
                    <td>Luxermbourgish (national) French, German (both administrative)</td>
                    <td>536,761</td>
                    <td>39.1</td>
                    <td>2,586</td>
                </tr>
                <tr>
                    <td>Russia</td>
                    <td>Russian, others</td>
                    <td>142,467,651</td>
                    <td>38.4</td>
                    <td>17,076,310</td>
                </tr>
                <tr>
                    <td>Sweden</td>
                    <td>Swedish, small Sami- and Finnish-speaking minorities</td>
                    <td>9,631,261</td>
                    <td>41.1</td>
                    <td>449,954</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-center">Data retrieved from <a
                            href="http://www.infoplease.com/ipa/A0855611.html" target="_blank">infoplease</a> and <a
                            href="http://www.worldometers.info/world-population/population-by-country/"
                            target="_blank">worldometers</a>.</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.1/js/dataTables.responsive.min.js"></script>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTable with responsive extension
            $('#example').DataTable({
                responsive: true
            });

            // Handle button click to show/hide table
            $('.show-table-button').on('click', function () {
                $('.data-table-wrapper').toggle();
                $(this).text(function (i, text) {
                    return text === "Show Table" ? "Hide Table" : "Show Table";
                });
            });
        });
    </script>
</body>

</html>