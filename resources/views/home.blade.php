@extends('layouts.global')
@section('title') Ahfas-Test | Dashboard @endsection
@section('page-title') Dashboard @endsection
@section('content')
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
