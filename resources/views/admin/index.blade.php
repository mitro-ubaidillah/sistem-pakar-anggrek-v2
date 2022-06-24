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
                        <div class="col-6 text-center">
                            <img src="{{ asset('img/img-1.png') }}" alt="" width="500">
                        </div>
                        <div class="col-6 m-auto">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <a href="{{ route('disease.index') }}" class="btn btn-custom-one"><i class="bi bi-journal-medical"></i> Lihat Penyakit yang terdaftar</a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ route('symptom.index') }}" class="btn btn-custom-one"><i class="bi bi-clipboard-pulse"></i> Lihat Gejala yang terdaftar</a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ route('cfUser.index') }}" class="btn btn-custom-one"><i class="bi bi-journal"></i> Lihat CF User yang terdaftar</a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="" class="btn btn-custom-one"><i class="bi bi-clipboard2-check"></i> Lihat Kasus yang terdaftar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection