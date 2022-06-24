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
                        <a href="{{ route('symptom.index') }}" class="btn bg-one font-color-default-w fw-semibold mb-3">Kembali Ke Halaman Gejala</a>
                        <h3 class="text-center font-color-default">Edit Gejala</h3>
                            <form action="{{ route('symptom.update', $symptom->id) }}" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-8 m-auto">
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Gejala</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name', $symptom->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Penyakit</label>
                                            <select class="form-select" id="inputGroupSelect01" name="disease_id">
                                                @foreach ($diseases as $disease)
                                                    @if ($symptom->disease->name === $disease->name)
                                                        <option value="{{ $disease->id }}" selected>{{ $disease->name }}</option>
                                                    @else
                                                        <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">CF Role</label>
                                            <input type="text" name="cf_role" class="form-control @error('cf_role') is-invalid @enderror" required value="{{ old('cf_role', $symptom->cf_role) }}">
                                        </div>
                                        <div class="col-lg-12 text-end">
                                            <a href="{{ route('symptom.index') }}" class="btn bg-danger-new font-color-default-w fw-semibold">Batal</a>
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