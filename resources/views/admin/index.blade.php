@extends('layouts.main')
@section('content')
    <main class="mb-5">
        <div class="container">
            <div class="card  border-0 shadow rounded">
                <div class="card-header bg-one">
                    @include('partials.navAdmin')
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-center">
                            <img src="{{ asset('img/img-1.png') }}" alt="" style="width: min(100% - 1vh, 85vh)">
                        </div>
                        <div class="col-md-5 col-sm-12 m-auto">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="text-center display-admin">
                                        <h4>Total Penyakit Terdaftar :</h4>
                                        <h5>{{ count($penyakit) }}</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="text-center display-admin">
                                        <h4>Total Kasus Terdaftar :</h4>
                                        <h5>{{ count($kasus) }}</h5>
                                    </div>
                                </div>
                                <div class="co-sm-12">
                                    <div class="text-center">
                                        <a href="{{ route('disease.create') }}" class="btn btn-custom-one">Mulai Tambahkan Penyakit Baru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </main>
@endsection