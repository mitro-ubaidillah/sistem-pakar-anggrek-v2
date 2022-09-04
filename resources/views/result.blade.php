@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid bg-one">
        <h1 class="font-color-default-w p-5 text-center">Halaman Hasil Diagnosa</h1>
    </div>
    <div class="container mb-5">
        <div class="card mt-5">
            <div class="card-body shadow">
                <div class="accordion borderless" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                          <strong>Kemungkinan Tanaman Anggrek Anda Terkena Penyakit {{ ucwords($finalResult[0]['disease']) }}</strong>
                        </button>
                      </h2>
                      @php
                            $dataGejala1 = explode(",",$finalResult[0]['symptoms']);
                            $dataCFRoles1 = explode(",",$finalResult[0]['cf_roles']);
                            $dataCFUsers1 = explode(",",$finalResult[0]['cf_users']);
                            $no = 1;
                      @endphp
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <h4>Penyakit {{ ucwords($finalResult[0]['disease']) }}</h4>
                            <p>Gejala terkait yang dipilih pengguna :</p>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <th width="1%">No</th>
                                    <th>Gejala</th>
                                    <th>Tingkat Keyakinan Pakar</th>
                                    <th>Tingkat Keyakinan Pengguna</th>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($dataGejala1); $i++)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $dataGejala1[$i] }}</td>
                                            @switch($dataCFRoles1[$i])
                                                @case(0.2)
                                                    <td class="text-center">10%-20%</td>
                                                    @break
                                                @case(0.4)
                                                    <td class="text-center">30%-40%</td>
                                                    @break
                                                @case(0.6)
                                                    <td class="text-center">50%-60%</td>
                                                    @break
                                                @case(0.8)
                                                    <td class="text-center">70%-80%</td>
                                                    @break
                                                @default
                                                    <td class="text-center">90%-100%</td>
                                            @endswitch
                                            @switch($dataCFUsers1[$i])
                                                @case(0.2)
                                                    <td class="text-center">10%-20%</td>
                                                    @break
                                                @case(0.4)
                                                    <td class="text-center">30%-40%</td>
                                                    @break
                                                @case(0.6)
                                                    <td class="text-center">50%-60%</td>
                                                    @break
                                                @case(0.8)
                                                    <td class="text-center">70%-80%</td>
                                                    @break
                                                @default
                                                    <td class="text-center">90%-100%</td>
                                            @endswitch
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            <h5>Presentase Perhitungan Sistem</h5>
                            <p>Kemiripan dengan kasus sebelumnya :</p>
                            <div class="progress">
                                <div class="progress-bar bg-one"  style="width: {{ $finalResult[0]['result_cbr']*100 }}%;font-size:1rem;" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $finalResult[0]['result_cbr']*100 }}%</div>
                            </div>
                            <p>Hasil perhitungan algoritma Certainty Factor :</p>
                            <div class="progress">
                                <div class="progress-bar bg-one" role="progressbar" style="width: {{ $finalResult[0]['result_cf']*100 }}%; font-size:1rem;" aria-valuemin="0" aria-valuemax="100">{{ $finalResult[0]['result_cf']*100 }}%</div>
                            </div>
                            @foreach ($dataDiseases as $disease)
                                @if ($finalResult[0]['disease'] == $disease->name)
                                    <h4>Keterangan</h4>
                                    <p>{{ $disease->description }}</p>
                                    <h4>Penanganan</h4>
                                    <p>{{ $disease->treatment }}</p>
                                @endif
                            @endforeach
                            {{-- <div class="text-end">
                                <form action="{{ route('diagnosa.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $finalResult[0]['symptoms'] }}" name="symptoms">
                                    <input type="hidden" value="{{ $finalResult[0]['symptoms'] }}" name="symptoms">
                                    <input type="hidden" value="{{ $finalResult[0]['result_cbr'] }}" name="result_cbr">
                                    <input type="hidden" value="{{ $finalResult[0]['total_cf_role'] }}" name="total_cf_role">
                                    <input type="hidden" value="{{ $finalResult[0]['cf_users'] }}" name="cf_users">
                                    <input type="hidden" value="{{ $finalResult[0]['result_cf'] }}" name="result_cf">
                                </form>
                            </div> --}}
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                          Lihat hasil lainnya
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            @foreach ($finalResult as $result)
                                @if($result['disease'] != $finalResult[0]['disease'])
                                    @php
                                        $dataGejala = explode(",",$result['symptoms']);
                                        $dataCFRoles = explode(",", $result['cf_roles']);
                                        $dataCFUsers = explode(",", $result['cf_users']);
                                        $x = 1;
                                    @endphp
                                    <div class="border-bottom p-3 border-danger border-5">
                                        <h4>Penyakit {{ ucwords($result['disease']) }}</h4>
                                        <p>Gejala terkait yang dipilih pengguna :</p>
                                        <table class="table table-bordered">
                                            <thead class="text-center">
                                                <th width="1%">No</th>
                                                <th>Gejala</th>
                                                <th>Tingkat Keyakinan Pakar</th>
                                                <th>Tingkat Keyakinan Pengguna</th>
                                            </thead>
                                            <tbody>
                                                @for ($i = 0; $i < count($dataGejala); $i++)
                                                    <tr>
                                                        <td>{{ $x++ }}</td>
                                                        <td>{{ $dataGejala[$i] }}</td>
                                                        @switch($dataCFRoles[$i])
                                                            @case(0.2)
                                                                <td class="text-center">10%-20%</td>
                                                                @break
                                                            @case(0.4)
                                                                <td class="text-center">30%-40%</td>
                                                                @break
                                                            @case(0.6)
                                                                <td class="text-center">50%-60%</td>
                                                                @break
                                                            @case(0.8)
                                                                <td class="text-center">70%-80%</td>
                                                                @break
                                                            @default
                                                                <td class="text-center">90%-100%</td>
                                                        @endswitch
                                                        @switch($dataCFUsers[$i])
                                                            @case(0.2)
                                                                <td class="text-center">10%-20%</td>
                                                                @break
                                                            @case(0.4)
                                                                <td class="text-center">30%-40%</td>
                                                                @break
                                                            @case(0.6)
                                                                <td class="text-center">50%-60%</td>
                                                                @break
                                                            @case(0.8)
                                                                <td class="text-center">70%-80%</td>
                                                                @break
                                                            @default
                                                                <td class="text-center">90%-100%</td>
                                                        @endswitch
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                        <h5>Presentase Perhitungan Sistem</h5>
                                        <p>Kemiripan dengan kasus sebelumnya :</p>
                                        <div class="progress">
                                            <div class="progress-bar bg-one"  style="width: {{ $result['result_cbr']*100 }}%;font-size:1rem;" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $result['result_cbr']*100 }}%</div>
                                        </div>
                                        <p>Hasil perhitungan algoritma Certainty Factor :</p>
                                        <div class="progress">
                                            <div class="progress-bar bg-one" role="progressbar" style="width: {{ $result['result_cf']*100 }}%; font-size:1rem;" aria-valuemin="0" aria-valuemax="100">{{ $result['result_cf']*100 }}%</div>
                                        </div>
                                        @foreach ($dataDiseases as $disease)
                                            @if ($result['disease'] == $disease->name)
                                                <h4>Keterangan</h4>
                                                <p>{{ $disease->description }}</p>
                                                <h4>Penanganan</h4>
                                                <p>{{ $disease->treatment }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                      </div>
                    </div>
                </div>
                <div class="float-end mt-5 sticky-bottom">
                    <a href="/diagnosa" class="btn bg-one font-color-default-w fw-semibold">Kembali ke halaman diagnosa</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection