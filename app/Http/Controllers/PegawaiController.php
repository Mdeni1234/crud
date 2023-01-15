<?php

namespace App\Http\Controllers;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index() {
        $pegawai = Pegawai::paginate(10);
        return view('index', ['pegawai' => $pegawai]);
    }
    public function tambah() {
        return view('tambah');
    }
    public function store(Request $req) {
        DB::table('pegawai')->insert([
            'pegawai_nama' => $req->nama,
            'pegawai_jabatan' => $req->jabatan,
            'pegawai_umur' => $req->umur,
            'pegawai_alamat' => $req->alamat
        ]);
        return redirect('/pegawai');
    }
    public function edit($id) {
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->get();
        return view('edit', ['pegawai' => $pegawai]);
    }
    public function update(Request $req) {
        DB::table('pegawai')->where('pegawai_id', $req->id)->update([
            'pegawai_nama' => $req->nama,
            'pegawai_jabatan' => $req->jabatan,
            'pegawai_umur' => $req->umur,
            'pegawai_alamat' => $req->alamat
        ]);
        return redirect('/pegawai');
    }
    public function hapus($id) {
        DB::table('pegawai')->where('pegawai_id', $id)->delete();
        return redirect('/pegawai');
    }

}
