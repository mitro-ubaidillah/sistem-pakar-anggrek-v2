@extends('layouts.main')
@section('content')
    <main class="mb-5 mt-4">
        <div class="container">
            <div class="card border-0 shadow rounded">
                <div class="card-header bg-one">
                    @include('partials.navAdmin')
                </div>
                <div class="card-body">
                    <a href="{{ route('cases.index') }}" class="btn bg-one font-color-default-w fw-semibold mb-3">Kembali Ke Halaman Daftar Kasus</a>
                    <h3 class="text-center font-color-default">Daftarkan Kasus Baru</h3>
                    <div class="row mt-5 mb-5">
                        <div class="col-lg-8 m-auto">
                            <form action="{{ route('cases.store') }}" method="POST">
                                @csrf
                                <div class="row mb-5">
                                    <div class="col-lg-8 m-auto">
                                        <div class="col-12 mb-3">
                                            <label class="label-input form-label">Nama Penyakit</label>
                                            <input type="text" name="disease" class="form-control" value="{{ $diseases->name }}" readonly>
                                        </div>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($dataGejala as $gejala)
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="G{{ $i++ }}" value="{{ $gejala['gejala'] }}" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    {{ $gejala['gejala'] }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
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