<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;
use App\Models\Pegawai;
// use App\Models\User;
// use Spatie\Permission\Models\Role;

class PegawaiComponent extends Component
{

    public $pegawai_id, $pegawai_nama, $jabatan, $umur, $alamat;
    use WithPagination;
    use AuthorizesRequests;

    public function render() {
        return view('index', ['pegawai' => Pegawai::paginate(10)])->extends('/layouts/app');

    }

    public function create() {
        $this->resetForm();
        $this->openModal();
    }
    public function openModal()
    {
        $this->dispatchBrowserEvent('openModal');
    }
    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
    public function resetForm() {
        $this->pegawai_id = '';
        $this->pegawai_nama = '';
        $this->jabatan = '';
        $this->umur = '';
        $this->alamat = '';
        $this->resetValidation();

    }

    public function store() {
        $this->validate([
            'pegawai_nama' => 'required',
            'jabatan' => 'required',
            'umur' => 'required|numeric|max:100',
            'alamat' => 'required',
        ]);
        Pegawai::updateOrCreate(['pegawai_id' => $this->pegawai_id], [
            'pegawai_nama' => $this->pegawai_nama,
            'pegawai_jabatan' => $this->jabatan,
            'pegawai_umur' => $this->umur,
            'pegawai_alamat' => $this->alamat
        ]);
        session()->flash('message', 
            $this->pegawai_id ? 'Pegawai Berhasil diupdate.' : 'Pegawai Berhasil ditambahkan.');
            $this->emit('crud_message');
        $this->closeModal();
        $this->resetForm();
    }
    public function edit($id) {
        $data = Pegawai::where('pegawai_id', $id)->firstOrFail();
        $this->pegawai_id = $data->pegawai_id;
        $this->pegawai_nama = $data->pegawai_nama;
        $this->jabatan = $data->pegawai_jabatan;
        $this->umur = $data->pegawai_umur;
        $this->alamat = $data->pegawai_alamat;
    
        $this->openModal();
    }
    public function destroy($id) {
       Pegawai::where('pegawai_id', $id)->delete();
       session()->flash('message', 'Pegawai deleted.');
       $this->emit('crud_message');
    }
}
