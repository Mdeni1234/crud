<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if (session()->has('message'))
        <div class="alert crud alert-warning" role="alert">
        {{session('message')}}
        </div>
            
        @endif
        @role('admin')
            <button wire:click="create()" class="btn btn-dark btn-block mb-2 me-2 float-end">Tambah Pegawai</button>
        @endrole
        <div>
        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Umur</th>
                <th scope="col">Alamat</th>
                @role('admin')
                    <th scope="col">Opsi</th>
                @endrole
                
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
                        @role('admin')
                        <td>
                            <div>
                            <button wire:click="edit({{$p->pegawai_id}})" class=" btn btn-primary btn-block">Edit</button>
                            <button wire:click="destroy({{$p->pegawai_id}})" class=" btn btn-danger btn-block">Hapus</button>
                            </div>

                        </td>                    
                        @endrole
                    </tr>
                    @endforeach

            </tbody>
            </table>
        </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button wire:click="resetForm()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div>
                <form>
                        {{ csrf_field() }}
                        <div class="modal-body">
                        <div class="form-group">
                        <input wire:model="pegawai_id" type="hidden" name="id"> <br/>
                        <label>Nama</label>
                        <input type="text" wire:model="pegawai_nama" class="form-control" placeholder="Enter name">
                        @error('pegawai_nama') 
                            <div class="alert alert-danger text-sm" role="alert">{{$message}}</div> 
                        @enderror 
                        <label>Jabatan</label>
                        <input type="text" wire:model="jabatan" class="form-control" placeholder="Enter Job Title">
                        @error('jabatan') 
                            <div class="alert alert-danger" role="alert">{{$message}}</div> 
                        @enderror 
                        <label>Umur</label>
                        <input type="number" wire:model="umur" class="form-control" placeholder="Enter Age">
                        @error('umur') 
                            <div class="alert alert-danger" role="alert">{{$message}}</div> 
                        @enderror 
                        <label>Alamat</label>
                        <textarea type="text" wire:model="alamat" class="form-control" placeholder="Enter Address"></textarea>
                        @error('alamat') 
                            <div class="alert alert-danger" role="alert">{{$message}}</div> 
                        @enderror 
                    </div>
                    </form>
                </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="resetForm()" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button wire:click.prevent="store()" type="submit" class="btn btn-dark btn-block mb-2 me-2 float-end">Submit</button>
                </div>
                </div>
            </div>
            </div>
</div>

<div class="d-flex justify-content-center">
{!!$pegawai->links('pagination::bootstrap-4')!!}
</div>
            <script>
        document.addEventListener('livewire:load', function () {
            var modalForm = new bootstrap.Modal(document.getElementById('modal-form'), {
                keyboard: false
            })
            window.addEventListener('closeModal', event => {
                modalForm.hide() 
            });
            window.addEventListener('openModal', event => {
                modalForm.show()  
            });  
            window.livewire.on('crud_message',()=>{
                setTimeout(() => { 
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                    });
                }, 2000); 
            });
        });           
        
    </script>