	@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		@foreach($pegawai as $p)
        <form action="/pegawai/update" method="post">
    {{ csrf_field() }}
  <div class="form-group">
  <input type="hidden" name="id" value="{{ $p->pegawai_id }}"> <br/>
    <label>Nama</label>
    <input class="form-control" placeholder="Enter name" name="nama" value="{{ $p->pegawai_nama }}" required="required">
    <label>Jabatan</label>
    <input class="form-control" placeholder="Enter Job Title" name="jabatan" value="{{ $p->pegawai_jabatan }}" required="required">
    <label>Umur</label>
    <input class="form-control" placeholder="Enter Age" name="umur" value="{{ $p->pegawai_umur }}" required="required">
    <label>Alamat</label>
    <textarea class="form-control" placeholder="Enter Address" name="alamat" required="required">{{ $p->pegawai_alamat }}</textarea>
  </div>
  <button type="submit" class="btn btn-block btn-primary">Update Data</button>
</form>
@endforeach
</div>
</div>
</div>
@endsection