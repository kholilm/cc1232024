@extends('layouts.main')

@section('content')
    {{-- <br> --}}
    <div class="content-wrapper">
        <section class="content">
            <br>
            <h1 class="mb-3 text-center">Notifications</h1>

            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <form action="/view-notif">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search.." name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($posts->count())
                {{-- $posts ambil dari controller  --}}
                @foreach ($posts as $p)
                    <div class="card mb-3">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h3 class="card-title" style="font-family:Georgia, serif;">{{ $p->title }}</h3>
                            <p class="card-text"> {!! $p->descriptions !!}</p>
                            <p class="card-text text-right"><small
                                    class="text-body-secondary">{{ $p->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center fs-4"> No post found</p>
            @endif

            <div class="d-flex justify-content-end">
                {{ $posts->links() }}
            </div>
        </section>
    </div>

@endsection
