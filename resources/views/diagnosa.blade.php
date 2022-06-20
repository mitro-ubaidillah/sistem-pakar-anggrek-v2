@extends('layouts.main')
@section('content')
    <main>
        <div class="container-fluid bg-one">
            <h1 class="font-color-default-w p-5 text-center">Halaman Diagnosa</h1>
        </div>
        <div class="container mb-5 mt-5">
            <div class="card  border-0 shadow rounded">
                <div class="card-header">
                    <span>Daftar Pertanyaan</span>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('diagnose') }}" method="POST">
                        @csrf
                        @foreach ($gejalas as $gejala)
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01" style="width:70%">Apakah Anggrek kamu mengalami {{ $gejala->gejala }} ?</label>
                            <select class="form-select" id="inputGroupSelect01" style="width:30%" name="{{ str_replace(" ","",$gejala->gejala) }}">
                                @foreach ($cfUsers as $cfUser)
                                    <option value="{{ $cfUser->cf_user }}">{{ $cfUser->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>           
                        @endforeach
                        <div class="text-end">
                            <a href="/" class="btn bg-danger-new font-color-default-w fw-semibold">Kembali Ke Halaman Utama</a>
                            <button type="reset" class="btn bg-second fw-semibold">Reset</button>
                            <button type="submit" class="btn bg-one font-color-default-w fw-semibold">Diagnosa Gejala</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection