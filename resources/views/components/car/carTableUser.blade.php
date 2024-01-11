<div class="row pt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                List of Cars
                <div class="row pt-2">
                    <div class="col-md-3">
                        <input id="carModel" class="form-control me-2" type="search" placeholder="Model" aria-label="Search">
                    </div>
                    <div class="col-md-3">
                        <select id="manufacturer" class="form-select" aria-label="Default select example">
                            <option value=''>Manufacture</option>
                            <option value="Perodua">Perodua</option>
                            <option value="Proton">Proton</option>
                            <option value="Mazda">Mazda</option>
                            <option value="Toyota">Toyota</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input id="minPrice" class="form-control me-2" type="search" placeholder="Min Price" aria-label="Search">
                    </div>
                    <div class="col-md-3">
                        <input id="maxPrice" class="form-control me-2" type="search" placeholder="Max Price" aria-label="Search">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="d-grid gap-2 d-sm-flex">
                        <button id="userSearchCar" class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>

            </div>
            <div class="card-body h-6 text-center">
                <table id="carsTable" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Vehicle Name</th>
                        <th scope="col">Price (RM)/day</th>
                        <th scope="col">Action</th>
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

<script>
    const authToken = localStorage.getItem('authToken');

    $(document).ready(function() {

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
                url: '/api/cars',
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${authToken}`,
                    'Content-Type': 'application/json',
                },
                data: {
                    filter,
                },
                dataType: 'json',
                success: function(response) {

                    var cars = response.cars.data;
                    var tableBody = document.getElementById('carsTableBody');

                    cars.forEach( function(car, index){
                        var row =
                            '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + car.manufacturer + '</td>' +
                                '<td>' + car.vehicle_name + '</td>' +
                                '<td>' + car.price + '</td>' +
                                '<td>' +
                                    '<button id="userBookingButton" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#userBookingModal" data-id="'+ car.id +'" data-manufacturer="' + car.manufacturer + '" data-vehicle="'+  car.vehicle_name +'" data-price="'+car.price+'">'+
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">'+
                                    '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>'+
                                    '</svg>'+
                                    '</button>'+
                                '</td>' +
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
