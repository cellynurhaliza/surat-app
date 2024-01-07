@extends('layouts.template')

@section('content')
<div class="jumbotron py-4 px-5">
    @if (Session::get('message'))
    <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
    <h1 class="display-4">
        Selamat datang!
    </h1>
    <hr class="my-4">
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Surat Keluar<div class="">1</div></li>
          <li class="list-group-item">Klarifikasi Surat<div class="">1</div></li>
          <li class="list-group-item">Staff Tata Usaha<div class="">1</div></li>
          <li class="list-group-item">Guru<div class=""></div>2</li>
        </ul>
      </div>
    {{-- <p>Aplikasi ini digunakan hanya oleh pegawai administrator APOTEK. Digunakan untuk mengelola data obat, penyetokan, juga pembelian (kasir)</p> --}}
</div>
@endsection