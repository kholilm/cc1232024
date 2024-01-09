@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="/templated/dist/css/style.css">

    <div class="content-wrapper">
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-4 mt-4">
                <main class="form-signin w-100 m-auto">
                    <form action="/register" method="post">
                        @csrf
                        {{-- <img class="mb-4 center" src="/templated/dist/img/cc123.png" alt="" width="70"
                        height="57"> --}}
                        <h1 class="h3 mb-3 fw-normal text-center">Form Registration</h1>

                        <div class="form-floating">
                            <input type="text" name="name"
                                class="form-control @error('name')
                            is-invalid @enderror"
                                id="name" placeholder="Username" required value="{{ old('name') }}">
                            <label for="name">Username</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="password" name="password"
                                class="form-control @error('password')
                                is-invalid @enderror"
                                id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                        </div>
                    </form>

                    <small class="d-block text-center mt-5">Already Registered? <a href="/login"> Login Now!</a></small>
                </main>
            </div>
        </div>
    </div>
@endsection
