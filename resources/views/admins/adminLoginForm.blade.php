@extends('layouts.userLoginApp')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div id="profileCard" class="card">
                <div class="card-header">
                    <strong>Admin Login</strong>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </div>
            </div>
        </div>
</div>

@endsection
