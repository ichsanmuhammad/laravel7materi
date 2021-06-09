<?php

namespace App\Http\Controllers;

use App\karyawan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $karyawans = Karyawan::all();
        return view('tampil.index', compact('karyawans'));
    }
}
