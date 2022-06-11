@extends('layouts.main')

@section('content')
<main>
    <div class="container mt-2 mb-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <img src="img/img-1.png" class="rounded img-banner" alt="banner">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p class="banner-text">Website ini merupakan website yang menampung informasi mengenai tanaman anggrek, penyakit, hama dan solusi untuk hal tersebut. Selain itu, website ini juga bisa digunakan untuk mendiagnosa penyakit dan hama pada tanaman anggrek</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <a href="#" class="btn btn-second f-24">Coba Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-one ps-5 pe-5">
        <div class="container">
            <div class="row row-cols-auto justify-content-md-center">
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="row text-center h-100">
                        <a href="" class="icon-link">
                            <div class="col-md-12 pt-4">
                                <img src="img/icon/list.png" alt="daftar-penyakit-hama" class="img-icon">
                            </div>
                            <div class="col-md-12 pb-4">
                                <span class="font-color-second f-16 default-spacing-text">Penyakit dan Hama</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="row text-center h-100">
                        <a href="" class="icon-link">
                            <div class="col-md-12 pt-4">
                                <img src="img/icon/list2.png" alt="daftar-penyakit-hama" class="img-icon">
                            </div>
                            <div class="col-md-12 pb-4">
                                <span class="font-color-second f-16 default-spacing-text">Buku Panduan</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="row text-center h-100">
                        <a href="#" class="icon-link">
                            <div class="col-md-12 col-sm-12 pt-4">
                                <img src="img/icon/search.png" alt="daftar-penyakit-hama" class="img-icon">
                            </div>
                            <div class="col-md-12 col-sm-12 pb-4">
                                <span class="font-color-second f-16 default-spacing-text">Diagnosa</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="row text-center h-100">
                        <a href="#" class="icon-link">
                            <div class="col-md-12 pt-4">
                                <img src="img/icon/user.png" alt="daftar-penyakit-hama" class="img-icon">
                            </div>
                            <div class="col-md-12 pb-4">
                                <span class="font-color-second f-16 default-spacing-text">Admin</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-second-alternative">
        <div class="container-fluid ps-5 pe-5 pt-5 pb-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-5 mb-5 text-center">
                            <p class="banner-text-2">Anggrek merupakan tanaman hias populer yang memiliki bunga unik dan simple cara tanamnya. Anggrek juga memiliki bunga yang indah dan unik, yang memiliki daya tarik tersendiri</p>
                        </div>
                        <div class="col-md-6 mb-5 mt-5 text-end">
                            <img src="img/img-2.png" class="rounded img-banner" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-one font-color-default-w">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="mb-4">Penyakit</h3>
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            {{-- <img src="img/icon/number-1.png" alt="" class="icon-number"> --}}
                            <span class="number-icon">1</span>
                            <span>Penyakit Pertama</span>
                        </div>
                        <div class="col-md-12 mb-5">
                            {{-- <img src="img/icon/number-1.png" alt="" class="icon-number"> --}}
                            <span class="number-icon">2</span>
                            <span>Penyakit Pertama</span>
                        </div>
                        <div class="col-md-12 mb-5">
                            {{-- <img src="img/icon/number-1.png" alt="" class="icon-number"> --}}
                            <span class="number-icon">3</span>
                            <span>Penyakit Pertama</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <h5 class="mb-4">Hama</h5>
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            {{-- <img src="img/icon/number-1.png" alt="" class="icon-number"> --}}
                            <span>Penyakit Pertama</span>
                            <span class="number-icon">1</span>
                        </div>
                        <div class="col-md-12 mb-5">
                            {{-- <img src="img/icon/number-1.png" alt="" class="icon-number"> --}}
                            <span>Penyakit Pertama</span>
                            <span class="number-icon">2</span>
                        </div>
                        <div class="col-md-12 mb-5">
                            {{-- <img src="img/icon/number-1.png" alt="" class="icon-number"> --}}
                            <span>Penyakit Pertama</span>
                            <span class="number-icon">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center pt-5 pb-5 font-color-default">
        <h2 class="mb-5">Panduan Penggunaan Aplikasi</h2>
        <p class="mb-4"><span class="number-icon border-black">1</span></p>
        <p class="mb-4">Penyakit Pertama</p>
        <p><span class="number-icon border-black">2</span></p>
        <p>Penyakit Pertama</p>
    </div>
</main>
@endsection