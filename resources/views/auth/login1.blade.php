@extends('layouts.auth', ['title' => 'Login Laracamp'])

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center">Login</h3>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="row mx-0 mb-3">
                                <button type="submit" class="btn btn-primary  ">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
