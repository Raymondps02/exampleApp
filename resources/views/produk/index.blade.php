{{-- <!DOCTYPE html>
<html>
<head> 
    @include('./css')
</head>
    <body>

        @include('./header')

    <div class="d-flex align-items-stretch">

        @include('./sidebar')

        @include('./body')

        @include('./footer')
    </body>
</html> --}}
<head> 
    @include('admin.css')
</head>
<body class="content">
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

                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <!-- FORM PENCARIAN -->
                        <div class="pb-3">
                        <form class="d-flex" action="{{ url('produk') }}" method="get">
                            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                            <button class="btn btn-secondary" type="submit">Cari</button>
                        </form>
                        </div>
                        <!-- TOMBOL TAMBAH DATA -->
                        <div class="pb-3">
                        @can('product-create') 
                        <a href='{{ url('produk/create') }}' class="btn btn-primary">+ Tambah Data</a>
                        @endcan
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-2">Kode</th>
                                    <th class="col-md-3">Nama</th>
                                    <th class="col-md-2">Keterangan</th>
                                    <th class="col-md-2">Harga</th>
                                    <th class="col-md-1">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data->firstItem()  ?>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>
                                        @can('product-edit')
                                        <a href='{{ url('produk/'.$item->kode.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                        @endcan
                                        @can('product-delete')
                                        <form onsubmit="return confirm('Hapus Data?')" class="d-inline" action="{{ url('produk/'.$item->kode) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                                Del
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                    {{-- <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                    <div class="p-6">
                        <x-primary-button class="btn btn-primary btn-block">
                            <a href="{{ url('/admin') }}">
                            {{ __('input data') }}
                            </a>
                        </x-primary-button>
                    </div> --}}
                </div>
            </div>
        </div>  
    </x-app-layout>
</body>





@extends('layouts.template')
            {{--@section('konten')
                <!-- START DATA -->
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <!-- FORM PENCARIAN -->
                    <div class="pb-3">
                    <form class="d-flex" action="" method="get">
                        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </form>
                    </div>
                    
                    <!-- TOMBOL TAMBAH DATA -->
                    <div class="pb-3">
                    <a href='{{ url('admin/create') }}' class="btn btn-primary">+ Tambah Data</a>
                    </div>
            
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-3">Nama</th>
                                <th class="col-md-3">Email</th>
                                <th class="col-md-2">Password</th>
                                <th class="col-md-2">Phone Number</th>
                                <th class="col-md-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem()  ?>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>
                                    <a href='{{ url('admin/'.$item->email.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Hapus Data?')" class="d-inline" action="{{ url('admin/'.$item->email) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                            Del
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{ $data->links() }}
            </div> 
            <!-- AKHIR DATA -->
            @endsection --}}

            {{-- <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin Page</title>
                <link rel="stylesheet" href="styles.css">
            </head>
            <body>
                <!-- Side Navbar -->
                <div class="sidebar">
                    <h2>Admin Dashboard</h2>
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Users</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Orders</a></li>
                        <!-- Add more menu items as needed -->
                    </ul>
                </div>
            
                <!-- Main Content -->
                <div class="content">
                    <!-- Your main content goes here -->
                    <h1>Welcome to the Admin Dashboard!</h1>
                </div>
            </body>
            </html> --}}
            