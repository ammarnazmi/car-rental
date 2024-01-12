@extends('layouts.userLoginApp')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <form action="" method="post" id="userLoginId">
                    <div id="profileCard" class="card">
                        <div class="card-header">
                            <strong>Login</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="emailId">
                                <div ><span id="emailLoginErrorMesage" class="text-danger"></span></div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordId">
                                <div ><span id="passwordLoginErrorMessage" class="text-danger"></span></div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ url('/register') }}">Register</a>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            @include('components.toast')

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#userLoginId').submit(function(event) {
                event.preventDefault();

                var email = $('#emailId').val();
                var password = $('#passwordId').val();

                $.ajax({
                    url: '/api/login',
                    method: 'POST',
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function(response) {
                        localStorage.setItem('authToken', response.token);

                        window.location.href = '/cars'
                    },
                    error: function(error) {
                        if(error.status == 404) {
                            document.getElementById("errorToastMessage").textContent = error.responseJSON.message;
                            $('#errorToast').toast('show');
                        }

                        if (error.responseJSON.errors.password) {
                            document.getElementById("passwordLoginErrorMessage").textContent = error.responseJSON.errors.password[0];
                        }

                        if(error.responseJSON.errors.email) {
                            document.getElementById("emailLoginErrorMesage").textContent = error.responseJSON.errors.email[0];
                        }
                    }
                });
            });
        })
    </script>
@endsection
