@extends('layouts.master')
@section('title', 'Halaman Edit')
@section('content')  
    
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Edit Karyawan</h1>
                <hr>
                <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') ?? $karyawan->nik }}">
                        @error('nik')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $karyawan->nama }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomer_telepon">Nomer Telepon</label>
                        <input type="text" name="nomer_telepon" id="nomer_telepon" class="form-control @error('nomer_telepon') is-invalid @enderror" value="{{ old('nomer_telepon') ?? $karyawan->telepon->nomer_telepon }}">
                        @error('nomer_telepon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" {{ old('jenis_kelamin') ?? $karyawan->jenis_kelamin == 'L' ? 'checked' : '' }}>
                        <label for="laki_laki" class="form-check-label">Laki-laki</label>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" {{ old('jenis_kelamin') ?? $karyawan->jenis_kelamin == 'P' ? 'checked' : '' }}>
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
                                <option value="{{ $bagian->id }}" {{ old('bagian_id') ?? $karyawan->bagian_id == $bagian->id ? 'selected' : '' }}>
                                    {{ $bagian->nama_bagian }}
                                </option>
                            @endforeach
                        </select>
                        @error('bagian')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ old('alamat') ?? $karyawan->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="hobi">Pilih Hobi</label>
                        <select class="edit-hobi js-states form-control" multiple="multiple" id="hobi" name="hobi[]">
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

@section('js')
    <script>
        $(".edit-hobi").select2().val({!! json_encode($karyawan->hobi()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection