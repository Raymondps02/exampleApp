@extends('layouts.template')
@section('konten')

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
                @include('components.pesan')

                    <form action='{{ url('admin/'.$data->email) }}' method='post'>
                    {{-- {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.update', $user->id]]) !!} --}}
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
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone_number" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit" style="background-color: rgb(0, 95, 255)">SIMPAN</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
@endsection
