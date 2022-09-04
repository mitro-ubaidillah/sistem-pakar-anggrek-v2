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
                        <a href="{{ route('cfUser.index') }}" class="btn bg-one font-color-default-w fw-semibold mb-3">Kembali Ke Halaman Tingkat Keyakinan</a>
                        <h3 class="text-center font-color-default">Edit Tingkat Keyakinan</h3>
                            <form action="{{  route('cfUser.update',$cfUser->id) }}" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-8 m-auto">
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Tingkat Keyakinan</label>
                                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" required value="{{ old('description', $cfUser->description) }}">
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nilai Tingkat Keyakinan</label>
                                            <input type="text" name="cf_user" class="form-control @error('cf_user') is-invalid @enderror" required value="{{ old('cf_user', $cfUser->cf_user) }}">
                                            @error('cf_user')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nilai Satuan Persen</label>
                                            <input type="text" name="cf_user" class="form-control @error('cf_user') is-invalid @enderror" required value="{{ old('cf_user', $cfUser->cf_user) }}">
                                            @error('cf_user')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 text-end">
                                            {{-- <button type="reset" class="btn bg-danger-new fw-semibold font-color-default-w">Batal</button> --}}
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