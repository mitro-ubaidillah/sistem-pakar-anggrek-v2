@extends('layouts.main')
@section('content')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<main class="mb-5 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header bg-one">
                        @include('partials.navAdmin')
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('disease.create') }}" class="btn bg-one font-color-default-w fw-semibold mb-3"><i class="bi bi-plus-square"></i> Tambah Data Penyakit</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Penyakit</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Penanganan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($diseases as $disease)
                                <tr>
                                    <td>{{ $disease->name }}</td>
                                    <td>{{ $disease->description }}</td>
                                    <td>{{ $disease->treatment }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini ?');" action="{{ route('disease.destroy', $disease->id) }}" method="POST">
                                            <a href="{{ route('disease.edit', $disease->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Penyakit belum Tersedia
                                </div>
                            @endforelse
                            </tbody>
                        </table>  
                        <div class="clear"></div>
                        {{ $diseases->links() }}
                        <a href="/admin/dashboard" class="btn bg-second fw-semibold float-end">Kembali ke halaman admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection