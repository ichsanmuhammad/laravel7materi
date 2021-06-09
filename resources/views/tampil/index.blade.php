@extends('layouts.admin')
@section('title', 'Halaman Utama Karyawan')
    
@section('content')
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nik</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Bagian</th>
                      <th>Alamat</th>
                      <th>Hobi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($karyawans as $karyawan)
                      <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ url('/karyawans/'.$karyawan->id) }}">{{ $karyawan->nik }}</a></td>
                            <td>{{ $karyawan->nama }}</td>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection