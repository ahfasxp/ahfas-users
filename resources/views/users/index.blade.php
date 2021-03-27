@extends('layouts.global')
@section('title') Ahfas | Users @endsection
@section('page-title') Manage Users @endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" data-toggle="modal" data-target="#create-user" class="btn btn-primary">Tambah Data Baru</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10%">avatar</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" width="60px" height="60px"
                                class="rounded-circle" alt="User Foto" style="object-fit: cover">
                            @else
                            <img src="https://source.unsplash.com/QAB-WJcbgJk/60x60" width="60px" height="60px"
                                class="rounded-circle" alt="User Foto">
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-secondary btn-sm" href="{{ route('users.show', $user->id) }}">
                                <i class="fas fa-info-circle">
                                </i>
                                Detail
                            </a>
                            <form class="d-inline swalDeleteConfirm" action="{{ route('users.destroy', [$user->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak Ada Data Users</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--SweetAlert2 Delete Confirm-->
<script type="text/javascript">
    $(function () {
        $('.swalDeleteConfirm').click(function () {
            var form = this;
            event.preventDefault();
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    return form.submit();
                }
            })
        });
    })

</script>
@endsection
