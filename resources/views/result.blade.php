@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid bg-one">
        <h1 class="font-color-default-w p-5 text-center">Halaman Hasil Diagnosa</h1>
    </div>
    <div class="container mb-5 mt-5">
        <div class="card  border-0 shadow rounded mb-5">
            <div class="card-body p-5">
                @foreach ($finalData as $key => $data)
                <div class="body-result pb-3 pt-3">
                    <h4>{{ $data['disease'] }}</h4>
                    <h5>Daftar Gejala</h5>
                    <table class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>CF Role</th>
                            <th>CF User</th>
                        </thead>
                        @php
                            $dataGejala = explode(",",$data['symptoms']);
                            $dataCFRoles = explode(",", $data['cf_roles']);
                            $dataCFUsers = explode(",", $data['cf_users']);
                            $x = 1;
                        @endphp
                        <tbody>
                            @for ($i = 0; $i < count($dataGejala); $i++)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{ $dataGejala[$i]}}</td>
                                    <td>{{ $dataCFRoles[$i]}}</td>
                                    <td>{{ $dataCFUsers[$i]}}</td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                    <h5>Kemungkinan Terkena Penyakit</h5>
                    <h6>Bedasarkan Perhitungan Kemiripan dengan data sebelumnya menggunakan Algoritma CBR</h6>
                    <div class="progress">
                        <div class="progress-bar"  style="width: {{ $data['result_cbr']*100 }}%;font-size:1rem;" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $data['result_cbr']*100 }}%</div>
                    </div>
                    <h6>Hasil Perhitungan Tingkat Keyakinan menggunakan Algoritma CF</h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $data['result_cf']*100 }}%; font-size:1rem;" aria-valuemin="0" aria-valuemax="100">{{ $data['result_cf']*100 }}%</div>
                    </div>
                </div>
                <hr>
                @endforeach
                <div class="float-end mt-2">
                    <a href="/diagnosa" class="btn bg-one font-color-default-w fw-semibold">Kembali ke halaman diagnosa</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection