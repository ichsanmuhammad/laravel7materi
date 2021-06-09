@extends('layouts.master')
@section('title', 'Halaman Create')
@section('content')    
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Data Karyawan</h1>
                <hr>
                <form action="{{ route('karyawans.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror">
                        @error('nik')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomer_telepon">Nomer Telepon</label>
                        <input type="text" name="nomer_telepon" id="nomer_telepon" class="form-control @error('nomer_telepon') is-invalid @enderror">
                        @error('nomer_telepon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                        <label for="laki_laki" class="form-check-label">Laki-laki</label>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                        <label for="perempuan" class="form-check-label">perempuan</label>
                        </label>
                    </div>
                    @error('jenis_kelamin')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="bagian_id">Bagian</label>
                        <select class="form-control" name="bagian_id" id="bagian_id">
                            @foreach ($bagians as $bagian)
                                <option value="{{ $bagian->id }}" {{ old('bagian_id') == "$bagian->nama_bagian" ? 'selected' : '' }}>
                                    {{ $bagian->nama_bagian }}
                                </option>
                            @endforeach
                            
                        </select>
                        @error('bagian_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ old('alamat') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="hobi">Pilih Hobi</label>
                        <select class="js-example-placeholder-multiple js-states form-control" multiple="multiple" id="hobi" name="hobi[]">
                            @foreach ($daftar_hobi as $hobi)
                                <option value="{{ $hobi->id }}">{{ $hobi->nama_hobi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    
    
