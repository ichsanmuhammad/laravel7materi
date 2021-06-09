@extends('layouts.master')
@section('title', 'Halaman Utama')
@section('content')  

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-4">
                    <h2>Table Data Karyawan</h2>
                    <a href="{{ route('karyawans.create') }}" class="btn btn-primary">Tambah Karyawan</a>
                </div>
                @if (session('pesan'))
                    <div class="alert alert-success">
                        {{ session('pesan') }}
                    </div>
                @endif
                @if (session('hapus'))
                    <div class="alert alert-danger">
                        {{ session('hapus') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Nomer Telepon</th>
                            <th>jenis_kelamin</th>
                            <th>Bagian</th>
                            <th>Alamat</th>
                            <th>Hobi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($karyawans as $karyawan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('karyawans.show', ['karyawan' => $karyawan->id]) }}">{{ $karyawan->nik }}</a></td>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->telepon->nomer_telepon }}</td>
                                <td>{{ $karyawan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                <td>{{ $karyawan->bagian->nama_bagian }}</td>
                                <td>{{ $karyawan->alamat == '' ? 'N/A' : $karyawan->alamat }}</td>
                                <td>
                                    @foreach ($karyawan->hobi as $item)
                                        {{ "$item->nama_hobi" }}
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection