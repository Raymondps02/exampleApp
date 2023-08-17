<!-- START FORM -->
<head>
    @include('admin.css')
</head>
@extends('layouts.template')
@section('konten')
<body class="content">
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
                        @include('components.pesan')
                        <form action='{{ url('roles') }}' method='post'>
                            @csrf
                            <div class="my-3 p-3 bg-body rounded shadow-sm">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Permission</label>
                                    <div class="col-sm-10">
                                        @foreach($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ $value->name }}</label>
                                        <br/>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="permission" class="col-sm-2 col-form-label"></label>
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
</body>
    
@endsection
