@extends('layouts.global')
@section('title') Ahfas | Edit User @endsection
@section('page-title') Edit User @endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="col-xl-6 col-12 ml-5">
            <form action="{{ route('users.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control form-control-user" name="name" value="{{ $user->name }}"
                        required placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control form-control-user" name="email" value="{{ $user->email }}"
                        required placeholder="Masukan Email">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control form-control-user" name="address" value="{{ $user->address }}"
                        required placeholder="Masukan Alamat">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" class="form-control form-control-user" name="phone" value="{{ $user->phone }}"
                        required placeholder="Masukan Telepon">
                </div>
                <div class="form-group">
                    <label for="">About</label>
                    <textarea class="form-control form-control-user" name="about" rows="5"
                        required placeholder="Masukan About">{{ $user->about }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Link Github</label>
                    <input type="text" class="form-control form-control-user" name="github" value="{{ $user->github }}"
                        required placeholder="Masukan Github">
                </div>
                <div class="form-group">
                    <label for="">Link Instagram</label>
                    <input type="text" class="form-control form-control-user" name="instagram" value="{{ $user->instagram }}"
                        required placeholder="Masukan Instagram">
                </div>
                <div class="form-group">
                    <label for="">Link Facebook</label>
                    <input type="text" class="form-control form-control-user" name="facebook" value="{{ $user->facebook }}"
                        required placeholder="Masukan Facebook">
                </div>
                <div class="form-group">
                    <label for="">Interests</label>
                    <textarea class="form-control form-control-user" name="interest" rows="5"
                        required placeholder="Masukan Interest">{{ $user->interest }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Avatar</label>
                    <br>
                    @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" width="100px" height="100px"
                        class="rounded-circle" alt="User Foto" style="object-fit: cover">
                    @else
                    <img src="https://source.unsplash.com/QAB-WJcbgJk/60x60" width="100px" height="100px"
                        class="rounded-circle" alt="User Foto">
                    @endif
                    <input type="file" class="form-control mt-3" name="avatar">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" name="password"
                            placeholder="Password">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" name="re-password"
                            placeholder="Ulangi Password">
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Edit User
                </button>
                <a href="{{ route('users.index') }}" type="submit" class="btn btn-secondary btn-user btn-block">
                    Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
