<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Telepon;
use App\Bagian;
use App\Hobi;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(){
        $karyawans = Karyawan::all();
        return view('karyawan.index', ['karyawans' => $karyawans]);
    }

    public function create(){
        $bagians = Bagian::all();
        $daftar_hobi = Hobi::all();
        return view('karyawan.create', compact('bagians', 'daftar_hobi'));
    }

    public function show(Karyawan $karyawan){
        return view('karyawan.show', compact('karyawan'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nik' => 'required|size:8|unique:karyawans',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'bagian_id' => 'required',
            'alamat' => ''
        ]);
        // $karyawan = new Karyawan();
        // $karyawan->nik = $validatedData['nik'];
        // $karyawan->nama = $validatedData['nama'];
        // $karyawan->jenis_kelamin = $validatedData['jenis_kelamin'];
        // $karyawan->bagian = $validatedData['bagian'];
        // $karyawan->alamat = $validatedData['alamat'];
        // $karyawan->save();
        $karyawan = Karyawan::create($validatedData);
        $telepon = new Telepon;
        $telepon->nomer_telepon = $request->input('nomer_telepon');
        $karyawan->telepon()->save($telepon);
        $karyawan->hobi()->attach($request->hobi);
        $request->session()->flash('pesan', "Data {$validatedData['nama']} Berhasil Disimpan");
        return redirect()->route('karyawans.index');
    }

    public function edit(Karyawan $karyawan){
        $bagians = Bagian::all();
        $daftar_hobi = Hobi::all();
        return view('karyawan.edit', compact('karyawan','bagians','daftar_hobi'));
    }

    public function update(Request $request, Karyawan $karyawan){
        $validatedData = $request->validate([
            'nik' => 'required|size:8|unique:karyawans,nik,'.$karyawan->id,
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'bagian_id' => 'required',
            'alamat' => ''
        ]);
        $karyawan->update($validatedData);
        $telepon = $karyawan->telepon;
        $telepon->nomer_telepon = $request->input('nomer_telepon');
        $karyawan->telepon()->save($telepon);
        $karyawan->hobi()->sync($request->hobi);
        return redirect()->route('karyawans.show', ['karyawan' => $karyawan->id])->with('pesan', "Update Data {$validatedData['nama']} Berhasil");
    }

    public function destroy(Karyawan $karyawan){
        $karyawan->delete();
        return redirect()->route('karyawans.index')->with('hapus', "Hapus data $karyawan->nama Berhasil");
    }
}

