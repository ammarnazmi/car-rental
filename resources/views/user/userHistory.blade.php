@extends('layouts.userApp')

@section('content')
    <div class="container">
        <div class="row pt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <strong>Car Rental History</strong>
                    </div>
                    <div class="card-body h-6 text-center">
                        <table id="carsTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Manufacturer</th>
                                    <th scope="col">Vehicle Name</th>
                                    <th scope="col">Total Price (RM)</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                </tr>
                            </thead>
                            <tbody id="carsTableBody">
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <div class="pagination ">
                            <nav aria-label="Page navigation example ">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            const authToken = localStorage.getItem('authToken');

            function fetchCars(carModel, manufacturer, minPrice, maxPrice) {
                var filter = {};

                if (carModel) {
                    filter['car_model'] = carModel;
                }

                if (manufacturer) {
                    filter['manufacturer'] = manufacturer;
                }

                if (minPrice) {
                    filter['minPrice'] = minPrice;
                }

                if (maxPrice) {
                    filter['maxPrice'] = maxPrice;
                }

                $.ajax({
                    url: '/api/rent/history',
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${authToken}`,
                    },
                    data: {
                        filter,
                    },
                    dataType: 'json',
                    success: function(response) {
                        var histories = response.history;
                        var tableBody = document.getElementById('carsTableBody');

                        histories.forEach(function(history, index) {
                            var startDateObject = new Date(history.start_date);
                            var endDateObject = new Date(history.end_date);

                            var startDate = startDateObject.toLocaleDateString('en-GB');
                            var endDate = endDateObject.toLocaleDateString('en-GB');
                            var row =
                                '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + history.car.manufacturer + '</td>' +
                                '<td>' + history.car.vehicle_name + '</td>' +
                                '<td>' + history.total_price + '</td>' +
                                '<td>' + startDate +'</td>' +
                                '<td>' + endDate +'</td>' +

                                '</tr>';
                            tableBody.innerHTML += row;
                        });
                    },
                });
            }

            fetchCars();

            $('#userSearchCar').on('click', function() {
                var carModel = $('#carModel').val();
                var manufacturer = $('#manufacturer').val();
                var minPrice = $('#minPrice').val();
                var maxPrice = $('#maxPrice').val();

                $('#carsTableBody').empty();

                fetchCars(carModel, manufacturer, minPrice, maxPrice);
            });
        });
    </script>
@endSection
