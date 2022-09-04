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
                        <h3 class="text-center font-color-default">Daftarkan Gejala Baru</h3>
                            <form action="{{ route('symptom.store') }}" method="POST" novalidate>
                                @csrf
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-8 m-auto">
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Gejala</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Penyakit</label>
                                            <select class="form-select @error('disease_id') is-invalid @enderror" id="inputGroupSelect01" name="disease_id">
                                                @foreach ($diseases as $disease)
                                                    <option value="{{ $disease->id }}" {{ old('disease_id') == $disease->id ? 'selected' : '' }}>{{ $disease->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('disease_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                             @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="label-input form-label">Bagian Tanaman</label>
                                            <select class="form-select @error('section') is-invalid @enderror" id="inputGroupSelect01" name="section">
                                                <option value="akar" {{ old('section') == 'akar' ? 'selected' : '' }}>Akar</option>
                                                <option value="daun" {{ old('section') == 'daun' ? 'selected' : '' }}>Daun</option>
                                                <option value="batang" {{ old('section') == 'batang' ? 'selected' : '' }}>Batang</option>
                                                <option value="bunga" {{ old('section') == 'bunga' ? 'selected' : '' }}>Bunga</option>
                                                <option value="lain-lain" {{ old('section') == 'lain-lain'? 'selected' : '' }}>Lain-Lain</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Tingkat Keyakinan Pakar</label>
                                            <select class="form-select @error('cf_role') is-invalid @enderror" id="inputGroupSelect01" name="cf_role">
                                                <option value="0.2" {{ old('cf_role') == 0.2 ? 'selected' : '' }}>10%-20%</option>
                                                <option value="0.4" {{ old('cf_role') == 0.4 ? 'selected' : '' }}>30%-40%</option>
                                                <option value="0.6" {{ old('cf_role') == 0.6 ? 'selected' : '' }}>50%-60%</option>
                                                <option value="0.8" {{ old('cf_role') == 0.8 ? 'selected' : '' }}>70%-80%</option>
                                                <option value="1" {{ old('cf_role') == 1 ? 'selected' : '' }}>90%-100%</option>
                                            </select>
                                            @error('cf_role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                             @enderror
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