@extends('layouts.main-input')
@section('content')
    <div class="content-wrapper">
        <div class="content-header border-bottom">
            <h1>Welcome, {{ auth()->user()->name }}</h1>
        </div>


    </div>
@endsection
