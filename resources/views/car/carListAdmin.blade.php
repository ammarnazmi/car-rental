@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                  Free
                </div>
                <div class="card-body h-6  text-center">
                  <h2 id="totalFreeCar" class="card-title text-success"></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                  Booked
                </div>
                <div class="card-body h-6  text-center">
                  <h2 id="totalBookedCar" class="card-title text-danger"> </h2>
                </div>
              </div>
        </div>
    </div>

@include('components.car.carTableAdmin')

</div>


<script>
    $(document).ready(function() {
        $.ajax({
                url: '/api/admin/cars/overview',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    document.getElementById("totalFreeCar").textContent = response.free;
                    document.getElementById("totalBookedCar").textContent = response.booked;
                }
            });
    });
</script>
@endsection
