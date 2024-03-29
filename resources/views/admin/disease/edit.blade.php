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
                        <a href="{{ route('disease.index') }}" class="btn bg-one font-color-default-w fw-semibold mb-3">Kembali Ke Halaman Penyakit</a>
                        <h3 class="text-center font-color-default">Edit Penyakit</h3>
                            <form action="{{ route('disease.update', $disease->id) }}" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-8 m-auto">
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Penyakit</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name',$disease->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Keterangan Penyakit</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" aria-label="With textarea" required>{{ old('description',$disease->description) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Penanganan Penyakit</label>
                                            <textarea class="form-control @error('treatment') is-invalid @enderror" name="treatment" aria-label="With textarea" required>{{ old('treatment',$disease->treatment) }}</textarea>
                                            @error('treatment')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 text-end">
                                            <a href="{{ route('disease.index') }}" class="btn bg-danger-new font-color-default-w fw-semibold">Batal</a>
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