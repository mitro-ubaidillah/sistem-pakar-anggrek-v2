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
                    <h3 class="text-center font-color-default">Pilih Penyakit</h3>
                    <div class="row mt-5 mb-5 text-center">
                        @foreach ($diseases as $data)
                            <div class="col-sm-3 m-auto mb-3">
                                <a href="{{ route('cases.show',$data->id) }}" class="btn btn-custom-one w-100">{{ $data->name }}</a>
                            </div>
                        @endforeach  
                    </div>
                </div>
            </div>     
        </div>
    </main>
@endsection