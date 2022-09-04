@extends('layouts.main')
@section('content')
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
                        <h3 class="text-center font-color-default">{{ $title }}</h3>
                        @if (session()->has('successAddDisease'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading">Berhasil</h4>
                                <p>{{ session('success') }}</p>
                                <hr>
                                <p class="mb-3">Selanjutnya Tambahkan Gejala Untuk Penyakit ini</p>
                                <a href="{{ route('symptom.create') }}" class="btn btn-procedure">Tambahkan Gejala</a>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <a href="{{ route('disease.create') }}" class="btn bg-one font-color-default-w fw-semibold mb-3"><i class="bi bi-plus-square"></i> Tambah Data Penyakit</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" width="1%">No</th>
                                        <th scope="col" width="15%">Penyakit</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Penanganan</th>
                                        <th scope="col" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($diseases as $no => $disease)
                                    <tr>
                                        <td>{{++$no + ($diseases->currentPage()-1)* $diseases->perPage()}}</td>
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
                        </div>
                        <div class="clear"></div>
                        <div class="row">
                            <div class="col-12 text-start mb-3 mt-3">
                                {{ $diseases->links() }}
                            </div>
                            <div class="col-12 text-end">
                                <a href="/admin/dashboard" class="btn bg-second fw-semibold float-end">Kembali ke halaman admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection