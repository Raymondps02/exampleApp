<!-- START FORM -->
@extends('layouts.template')
@section('konten')
@include('components.pesan')
<head>
    @include('admin.css')
</head>

<div class="content">
    <x-app-layout>
        <x-slot name="header" class="px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12" >
            <div class="d-flex align-items-stretch ">
                @include('admin.sidebar')
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form action='{{ url('produk/'.$data->kode) }}' method='post'>
                        @csrf
                        @method('PUT')
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <a href='{{ url('produk') }}' class="btn btn-secondary">Back</a>
                            <div class="mb-3 row">
                                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                    {{ $data->kode }}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='keterangan' value="{{ $data->keterangan }}" id="keterangan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name='harga' value="{{ $data->harga }}" id="harga">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="harga" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit" style="background-color: rgb(0, 95, 255)">SIMPAN</button></div>
                            </div>
                        
                        </div>
                    </form>
        <!-- AKHIR FORM -->
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
@endsection
