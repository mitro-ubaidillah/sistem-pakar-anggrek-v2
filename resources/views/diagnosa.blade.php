@extends('layouts.main')
@section('content')
    <main>
        <div class="container-fluid bg-one">
            <h1 class="font-color-default-w p-5 text-center">Halaman Diagnosa</h1>
        </div>
        <div class="container mb-5 mt-5">
            <div class="card border-0 shadow rounded">
                <div class="card-header">
                    <h5>Daftar Pertanyaan</h5>
                </div>
                <div class="card-body p-5">
                    <h4 class="text-center mb-5">Jawab Sesuai Dengan Kondisi Bunga Anggrek Anda!</h4>
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mb-3">
                        <button type="button" class="btn bg-one font-color-default-w" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Lihat Keterangan Tingkat Keyakinan
                        </button>
                        <a href="/" class="btn bg-danger-new font-color-default-w fw-semibold">Kembali</a>
                    </div>
                    <div class="mb-5 mt-5">
                        <form action="{{ route('result') }}" method="POST">
                            @csrf
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Gejala Pada Daun
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>No</th>
                                                        <th>Gejala yang terjadi</th>
                                                        <th>Tingkat Keyakinan</th>
                                                    </thead>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    <tbody>
                                                        @forelse ($daun as $data)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $data }}</td>
                                                                <td>
                                                                    <select class="form-select" aria-label="Default select example" name="{{ str_replace(" ","",$data) }}">
                                                                        <option value="0">0%</option>
                                                                        <option value="0.2">10%-20%</option>
                                                                        <option value="0.4">30%-40%</option>
                                                                        <option value="0.6">50%-60%</option>
                                                                        <option value="0.8">70%-80%</option>
                                                                        <option value="1">90%-100%</option>
                                                                    </select>     
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        <td colspan="3">Data kosong</td>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Gejala Pada Akar
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>No</th>
                                                        <th>Gejala yang terjadi</th>
                                                        <th>Tingkat Keyakinan</th>
                                                    </thead>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    <tbody>
                                                        @forelse ($akar as $data)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $data }}</td>
                                                                <td>
                                                                    <select class="form-select" aria-label="Default select example" name="{{ str_replace(" ","",$data) }}">
                                                                        <option value="0">0%</option>
                                                                        <option value="0.2">10%-20%</option>
                                                                        <option value="0.4">30%-40%</option>
                                                                        <option value="0.6">50%-60%</option>
                                                                        <option value="0.8">70%-80%</option>
                                                                        <option value="1">90%-100%</option>
                                                                    </select>     
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        <td colspan="3">Data kosong</td>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Gejala Pada Batang
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>No</th>
                                                        <th>Gejala yang terjadi</th>
                                                        <th>Tingkat Keyakinan</th>
                                                    </thead>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    <tbody>
                                                        @forelse ($batang as $data)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $data }}</td>
                                                                <td>
                                                                    <select class="form-select" aria-label="Default select example" name="{{ str_replace(" ","",$data) }}">
                                                                        <option value="0">0%</option>
                                                                        <option value="0.2">10%-20%</option>
                                                                        <option value="0.4">30%-40%</option>
                                                                        <option value="0.6">50%-60%</option>
                                                                        <option value="0.8">70%-80%</option>
                                                                        <option value="1">90%-100%</option>
                                                                    </select>     
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        <td colspan="3">Data kosong</td>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                            Gejala Bunga
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>No</th>
                                                        <th>Gejala yang terjadi</th>
                                                        <th>Tingkat Keyakinan</th>
                                                    </thead>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    <tbody>
                                                        @forelse ($bunga as $data)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $data }}</td>
                                                                <td>
                                                                    <select class="form-select" aria-label="Default select example" name="{{ str_replace(" ","",$data) }}">
                                                                        <option value="0">0%</option>
                                                                        <option value="0.2">10%-20%</option>
                                                                        <option value="0.4">30%-40%</option>
                                                                        <option value="0.6">50%-60%</option>
                                                                        <option value="0.8">70%-80%</option>
                                                                        <option value="1">90%-100%</option>
                                                                    </select>     
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        <td colspan="3">Data kosong</td>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                            Gejala Lain-Lain
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>No</th>
                                                        <th>Gejala yang terjadi</th>
                                                        <th>Tingkat Keyakinan</th>
                                                    </thead>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    <tbody>
                                                        @forelse ($other as $data)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $data }}</td>
                                                                <td>
                                                                    <select class="form-select" aria-label="Default select example" name="{{ str_replace(" ","",$data) }}">
                                                                        <option value="0">0%</option>
                                                                        <option value="0.2">10%-20%</option>
                                                                        <option value="0.4">30%-40%</option>
                                                                        <option value="0.6">50%-60%</option>
                                                                        <option value="0.8">70%-80%</option>
                                                                        <option value="1">90%-100%</option>
                                                                    </select>     
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <td colspan="3">Data kosong</td>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btns-diagnosa sticky-bottom">
                                <button type="reset" class="btn bg-second fw-semibold">Reset</button>
                                <button type="submit" class="btn bg-one font-color-default-w fw-semibold">Diagnosa Gejala</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tingkat Keyakinan Pengguna</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead class="text-center table-primary">
                            <tr>
                                <th>No</th> 
                                <th>Persentase</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>0%</td>
                                <td>Anggrek tidak mengalami gejala tersebut</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>10%-20%</td>
                                <td>User tidak tahu apakah anggrek mengalami gejala atau tidak</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>30%-40%</td>
                                <td>User tidak yakin dan anggrek menunjukan gejala yang tidak jelas sesuai atau tidak</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>50%-60%</td>
                                <td>User tau ada gejala tersebut tapi gejala masih belum jelas dan kurang meyakinkan</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>70%-80%</td>
                                <td>User yakin terhadap gejala tersebut, tetapi gejalanya masih kurang jelas</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>90%-100%</td>
                                <td>Anggrek mengalami gejala tersebut dan user sangat yakin terhadap gejala itu</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </main>
@endsection