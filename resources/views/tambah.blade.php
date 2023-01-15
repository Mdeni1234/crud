@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="/pegawai/store" method="post">
    {{ csrf_field() }}
  <div class="form-group">
    <label>Nama</label>
    <input class="form-control" placeholder="Enter name" name="nama" required="required">
    <label>Jabatan</label>
    <input class="form-control" placeholder="Enter Job Title" name="jabatan" required="required">
    <label>Umur</label>
    <input class="form-control" placeholder="Enter Age" name="umur" required="required">
    <label>Alamat</label>
    <textarea class="form-control" placeholder="Enter Address" name="alamat" required="required"></textarea>
  </div>
  <button type="submit" class="btn btn-block btn-primary">Simpan Data</button>
</form>
</div>
</div>
</div>
@endsection