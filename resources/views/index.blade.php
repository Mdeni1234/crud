@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a class="btn btn-primary btn-lg mb-2 me-2 float-end" href="/pegawai/tambah">Tambah Pegawai</a>
        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Umur</th>
                <th scope="col">Alamat</th>
                <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pegawai as $p)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $p->pegawai_nama }}</td>
                        <td>{{ $p->pegawai_jabatan }}</td>
                        <td>{{ $p->pegawai_umur }}</td>
                        <td>{{ $p->pegawai_alamat }}</td>
                        <td>
                            <a class=" btn btn-primary btn-block" href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
                            
                            <a class=" btn btn-danger btn-block" href="/pegawai/hapus/{{ $p->pegawai_id }}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach

            </tbody>
            </table>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    {!! $pegawai->links('pagination::bootstrap-4') !!}
        </div>
        
@endsection