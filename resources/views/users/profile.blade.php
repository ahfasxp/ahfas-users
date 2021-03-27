@extends('layouts.global')
@section('title') Ahfas | Profile @endsection
@section('page-title') Profile @endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        @if($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" width="200px" height="200px" class="rounded" alt="User Foto"
            style="object-fit: cover; float: left; margin-right: 50px;">
        @else
        <img src="https://source.unsplash.com/QAB-WJcbgJk/60x60" width="200px" height="200px" class="rounded"
            alt="User Foto" style="float: left; margin-right: 50px;">
        @endif
        <div style="float:left;">
            <p>Nama : {{ $user->name }}</p>
            <p>Email : {{ $user->email }}</p>
            <p>Alamat : {{ $user->address }}</p>
            <p>Telepon : {{ $user->phone }}</p>
            <p>About : {{ $user->about }}</p>
            <p>Github : {{ $user->github }}</p>
            <p>Instagram : {{ $user->instagram }}</p>
            <p>Facebook : {{ $user->facebook }}</p>
            <p>Interests : {{ $user->interests }}</p>
        </div>
        <a class="btn btn-info btn-sm float-right" href="{{ route('users.edit', $user->id) }}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>
    </div>
</div>
@endsection
