@extends('layouts.userApp')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-6">
                <div id="profileCard" class="card">
                    <div class="card-header">
                        Profile
                        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                            </svg>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input id="username" class="form-control" type="text" name="username" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="text" name="email" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phoneNumber">Phone Number</label>
                            <input id="phoneNumber" class="form-control" type="text" name="phoneNumber" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Password
                        <button class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#updatePasswordModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                            </svg>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <input id="username" class="form-control" type="text" name="username" value="******"
                                disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const authToken = localStorage.getItem('authToken');

            $.ajax({
                url: '/api/user',
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${authToken}`,
                },
                dataType: 'json',
                success: function(response) {
                    $('#username').val(response.user.name);
                    $('#email').val(response.user.email);
                    $('#phoneNumber').val(response.user.phone);
                    $('#updateUsername').val(response.user.name);
                    $('#updateEmail').val(response.user.email);
                    $('#updatePhoneNumber').val(response.user.phone);
                }
            });
        })
    </script>
    @include('components.user.adminUpdateProfileModal')
    @include('components.admins.adminUpdatePasswordModal')
    @include('components.toast')
@endsection
