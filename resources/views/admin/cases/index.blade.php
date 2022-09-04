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
                        <h3 class="text-center font-color-default">{{ $title }}</h3>
                        <a href="{{ route('cases.create') }}" class="btn bg-one font-color-default-w fw-semibold mb-3"><i class="bi bi-plus-square"></i> Tambah Kasus Baru</a>
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" width="1%">No</th>
                                    <th scope="col">Penyakit</th>
                                    <th scope="col">Gejala</th>
                                    {{-- <th scope="col">Tingkat Keyakinan Pakar</th> --}}
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cases as $no => $case)
                                    <tr>
                                        <td>{{ ++$no + ($cases->currentPage()-1)* $cases->perPage() }}</td>
                                        <td>{{ ucwords(str_replace("_", " ",$case->disease)) }}</td>
                                        <td>{{ $case->symptoms}}</td>  
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini ?');" action="{{route('cases.destroy',$case->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Gejala belum Tersedia
                                    </div>
                                @endforelse
                            </tbody>
                        </table>  
                        <div class="clear"></div>
                        {{ $cases->links() }}
                        <a href="/admin/dashboard" class="btn bg-second fw-semibold float-end">Kembali ke halaman admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection