@extends('layouts.template')

@section('content')
<h4>Tambah Data Surat</h4>
    <form action="{{ route('order.staff.store') }}" method="POST" class="card p-5">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <div class="mb-3 row">
            <label for="letter_perihal" class="col-sm-2 col-form-label">Perihal :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="letter_perihal" name="letter_perihal">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Klasifikasi Surat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" name="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Isi Surat :</label>
            <div class="col-sm-10">
                <input type="long text" class="form-control" id="content" name="content">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <label for="">Dinda S.S.</label><input type="checkbox"><br>
                <label for="">Aira S.Si.</label><input type="checkbox">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="attachment" class="col-sm-2 col-form-label">Lampiran :</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="attachment" name="attachment">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="notulis" class="col-sm-2 col-form-label">Notulis :</label>
            <div class="col-sm-10">
                <select name="role" id="role" class="form-control">
                    <option selected disabled hidden>Pilih</option>
                    <option value="notulis">Dinda S.S.</option>
                    <option value="notulis">Aira S.Si.</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>
@endsection