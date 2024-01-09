@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="/templated/dist/css/style.css">
    <link rel="stylesheet" href="/templated/dist/css/bootstrap.min.css">

    <div class="content-wrapper">
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-4 mt-4">

                @if (session()->has('succes'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('succes') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <main class="form-signin w-100 m-auto">
                    <form action="/login" method="post">
                        @csrf

                        {{-- <img class="mb-4 center" src="/templated/dist/img/cc123.png" alt="" width="70"
                            height="57"> --}}

                        <h1 style = "font-family:Lucida Console;font-style:italic;font-weight:bold"
                            class="h3 mb-3 fw-normal text-center">
                            Please login <i class="bi bi-emoji-expressionless"></i></h1>

                        <div class="form-floating">
                            <input type="text" name="name" class="form-control"
                                @error('name') is-invalid
                            @enderror id="name"
                                placeholder="Username" autofocus required>
                            <label for="name"> <span class="fas fa-user"></span></label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password" required>
                            <label for="password"> <span class="fas fa-lock"></span></label>
                        </div>
                        <div>
                            <button style = "font-family:Lucida Console;font-size:20px;font-style:italic;"
                                class="btn btn-primary w-50 py-2" type="submit">log in</button>
                        </div>
                    </form>

                    <small class="d-block text-center mt-5">Not Registered? <a href="/register"> Register Now!</a></small>
                </main>
            </div>
        </div>
    </div>
@endsection
