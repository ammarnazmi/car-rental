@extends('layouts.userApp')

@section('content')
    <div class="bg-dark text-secondary px-4  text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Rent Car Now</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error perferendis officia
                    quaerat debitis nemo, alias nisi? Sunt consequatur veritatis delectus.</p>

            </div>
        </div>
    </div>

    <div class="container">
        @include('components.car.carTableUser')
    </div>

    @include('components.user.userBookingModal')

    <script></script>
@endsection
