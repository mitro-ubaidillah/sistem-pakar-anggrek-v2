@extends('layouts.main')
@section('content')
    <main class="mb-5 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                        <a href="{{ route('gejala.index') }}" class="btn bg-one font-color-default-w fw-semibold mb-3">Kembali Ke Halaman Gejala</a>
                        <h3 class="text-center font-color-default">Edit Gejala</h3>
                            <form action="{{ route('gejala.update') }}" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-8 m-auto">
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Gejala</label>
                                            <input type="text" name="gejala" class="form-control @error('gejala') is-invalid @enderror" required value="{{ old('gejala', $gejala->gejala) }}">
                                            @error('gejala')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Penyakit</label>
                                            <select class="form-select" id="inputGroupSelect01" name="penyakit_id">
                                                @foreach ($penyakits as $penyakit)
                                                    @if ($gejala->penyakit->nama === $penyakit->nama)
                                                        <option value="{{ $penyakit->id }}" selected>{{ $penyakit->nama }}</option>
                                                    @else
                                                        <option value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">CF Role</label>
                                            <input type="text" name="cf_role" class="form-control @error('cf_role') is-invalid @enderror" required value="{{ old('cf_role', $gejala->cf_role) }}">
                                        </div>
                                        <div class="col-lg-12 text-end">
                                            <a href="{{ route('gejala.index') }}" class="btn bg-danger-new font-color-default-w fw-semibold">Batal</a>
                                            <button type="submit" class="btn bg-second fw-semibold font-color-default">Ubah</button>
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