<!-- START FORM -->
@extends('layouts.template')
@section('konten')
@include('components.pesan')

    <form action='{{ url('admin/'.$data->email) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('admin') }}' class="btn btn-secondary">Back</a>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{ $data->name }}" id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                {{ $data->email }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name='password' value="{{ $data->password }}" id="password">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='phone_number' value="{{ $data->phone_number }}" id="phone_number">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone_number" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
</form>
    <!-- AKHIR FORM -->
@endsection
