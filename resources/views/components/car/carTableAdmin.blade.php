<div class="row pt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                List of Cars
                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                    </svg>
                </button>
            </div>
            <div class="card-body h-6 text-center">
                <table id="carsTable" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Vehicle Name</th>
                        <th scope="col">Price (RM)/day</th>
                        <th scope="col">Status</th>
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
    $(document).ready(function() {
        $.ajax({
                url: '/api/admin/cars',
                method: 'GET',
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
                                    (car.status == 'free' ?
                                        '<span class="badge text-bg-success"> ' + car.status + '</span>' :
                                        '<span class="badge text-bg-danger"> ' + car.status + '</span>'
                                    ) +
                                '</td>' +
                                '<td>' +
                                '<button class="btn btn-primary mx-1" >' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">' +
                                '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>' +
                                '</svg>' +
                                '</button>' +
                                '<button class="btn btn-danger">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">' +
                                '<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>' +
                                '</svg>' +
                                '</button>' +
                                '</td>' +
                            '</tr>';

                        tableBody.innerHTML += row;
                    });
                }
            });
    });
</script>
