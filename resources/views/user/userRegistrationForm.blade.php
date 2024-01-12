@extends('layouts.userLoginApp')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <form action="" method="post" id="registerForm">
                    <div id="profileCard" class="card">
                        <div class="card-header">
                            <strong>Register</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameId">
                                <div><span id="nameErrorMesage" class="text-danger"></span></div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="emailId" aria-describedby="emailHelp">
                                <div><span id="emailErrorMesage" class="text-danger"></span></div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">phone</label>
                                <input type="phone" class="form-control" id="phoneId">
                                <div><span id="phoneErrorMesage" class="text-danger"></span></div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordId">
                                <div><span id="passwordErrorMesage" class="text-danger"></span></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                            <a href="{{ url('/') }}">Login</a>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

    @include('components.toast')

    <script>
        $(document).ready(function() {
            $('#registerForm').submit(function(event) {
                event.preventDefault();

                var name = $('#nameId').val();
                var email = $('#emailId').val();
                var phone = $('#phoneId').val();
                var password = $('#passwordId').val();

                $.ajax({
                    url: '/api/register',
                    method: 'POST',
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        password: password,
                    },
                    success: function(response) {
                        $('#successToast').toast('show');
                        document.getElementById("successToastMessage").textContent = response.message;

                        setTimeout(function() {
                            window.location.href = '/login';
                        }, 1000);
                    },
                    error: function(error) {
                        if (error.status == 404) {
                            document.getElementById("errorToastMessage").textContent = error
                                .responseJSON.message;
                            $('#errorToast').toast('show');
                        }

                        if (error.responseJSON.errors.phone) {
                            document.getElementById("phoneErrorMesage").textContent =
                                error.responseJSON.errors.phone[0];
                        }

                        if (error.responseJSON.errors.email) {
                            document.getElementById("emailErrorMesage").textContent = error
                                .responseJSON.errors.email[0];
                        }

                        if (error.responseJSON.errors.name) {
                            document.getElementById("nameErrorMesage").textContent = error
                                .responseJSON.errors.name[0];
                        }

                        if (error.responseJSON.errors.password) {
                            document.getElementById("passwordErrorMesage").textContent = error
                                .responseJSON.errors.password[0];
                        }
                    }
                });
            });
        })
    </script>
@endsection
