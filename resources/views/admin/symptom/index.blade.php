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
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('successAddSymptom'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading">Berhasil</h4>
                                <p>{{ session('success') }}</p>
                                <hr>
                                <p class="mb-3">Selanjutnya Tambahkan Kasus Atau Gejala Lagi</p>
                                <a href="{{ route('symptom.create') }}" class="btn btn-procedure">Tambahkan Gejala</a>
                                <a href="{{ route('cases.create') }}" class="btn btn-procedure">Tambahkan Kasus</a>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <a href="{{ route('symptom.create') }}" class="btn bg-one font-color-default-w fw-semibold mb-3"><i class="bi bi-plus-square"></i> Tambah Data Gejala</a>
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" width="1%">No</th>
                                    <th scope="col">Gejala</th>
                                    <th scope="col">Penyakit</th>
                                    <th scope="col">Bagian</th>
                                    <th scope="col">Tingkat Keyakinan Pakar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($symptoms as $no => $symptom)
                                    <tr>
                                        <td>{{ ++$no + ($symptoms->currentPage()-1)* $symptoms->perPage() }}</td>
                                        <td>{{ $symptom->name }}</td>
                                        <td class="text-center">{{ $symptom->disease->name }}</td>
                                        <td class="text-center">{{ $symptom->section }}</td>
                                        @switch($symptom->cf_role)
                                            @case(0.2)
                                                <td class="text-center">10%-20%</td>
                                                @break
                                            @case(0.4)
                                                <td class="text-center">30%-40%</td>
                                                @break
                                            @case(0.6)
                                                <td class="text-center">50%-60%</td>
                                                @break
                                            @case(0.8)
                                                <td class="text-center">70%-80%</td>
                                                @break
                                            @default
                                                <td class="text-center">90%-100%</td>
                                        @endswitch
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini ?');" action="{{ route('symptom.destroy', $symptom->id) }}" method="POST">
                                                <a href="{{ route('symptom.edit', $symptom->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
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
                        {{ $symptoms->links() }}
                        <a href="/admin/dashboard" class="btn bg-second fw-semibold float-end">Kembali ke halaman admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection