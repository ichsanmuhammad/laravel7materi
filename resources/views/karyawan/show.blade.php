@extends('layouts.master')
@section('title', 'Halaman Show')
@section('content')  
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3 d-flex justify-content-end align-items-center">
                    <h1 class="h1 mr-auto">Biodata {{$karyawan->nama}}</h1>
                    <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
                <hr>
                @if (session('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session('pesan') }}
                    </div>
                @endif
                <ul>
                    <li>Nik : {{ $karyawan->nik }}</li>
                    <li>Nama : {{ $karyawan->nama }}</li>
                    <li>Nomer Telepon : {{ $karyawan->telepon->nomer_telepon }}</li>
                    <li>Jenis_kelamin : {{ $karyawan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</li>
                    <li>Bagian : {{ $karyawan->bagian->nama_bagian }}</li>
                    <li>Alamat : {{ $karyawan->alamat == '' ? 'N/A' : $karyawan->alamat}}</li>
                    <li>Hobi :
                        @foreach ($karyawan->hobi as $item)
                            {{ "$item->nama_hobi," }}
                        @endforeach
                    </li>
                    <a href="{{ route('karyawans.index') }}" class="btn btn-info">Kembali</a>
                </ul>
            </div>
        </div>
    </div>
@endsection