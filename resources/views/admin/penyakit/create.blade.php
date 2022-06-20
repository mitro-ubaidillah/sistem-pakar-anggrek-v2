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
                        <a href="{{ route('penyakit.index') }}" class="btn bg-one font-color-default-w fw-semibold mb-3">Kembali Ke Halaman Penyakit</a>
                        <h3 class="text-center font-color-default">Daftarkan Penyakit Baru</h3>
                            <form action="{{ route('penyakit.store') }}" method="POST" novalidate>
                                @csrf
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-8 m-auto">
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Penyakit</label>
                                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Keterangan Penyakit</label>
                                            <textarea class="form-control" name="keterangan" aria-label="With textarea" required>{{ old('keterangan') }}</textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Penanganan Penyakit</label>
                                            <textarea class="form-control" name="penanganan" aria-label="With textarea" required>{{ old('penanganan') }}</textarea>
                                        </div>
                                        <div class="col-lg-12 text-end">
                                            <button type="reset" class="btn bg-danger-new fw-semibold font-color-default-w">Batal</button>
                                            <button type="submit" class="btn bg-second fw-semibold font-color-default">Daftarkan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection