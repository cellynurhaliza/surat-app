@extends('layouts.template')

@section('content')
<h3>Edit Staff Tata Usaha</h3>
    <form action="{{ route('order.staff.update', $orders['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value=" {{ $orders['nama'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email"  value=" {{ $orders['email'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password" value="{{ $orders['password']}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>
@endsection