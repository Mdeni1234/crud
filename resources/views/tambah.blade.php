<!-- <div class="container">
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
</div> -->
<!-- <div class="modal modal-dialog modal-dialog-centered" tabindex="9999">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div> -->
            <div>
            <div class="modal fade" id="onload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- Add this line to your code -->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Do You Want Cookie? We Want Yours! 🍪</h5>
                    </div>
                    <div class="modal-body">
                        This site uses cookies to personalies the content for you.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> <!-- And the relavant closing div tag -->
            <script>
                document.addEventListener('livewire:load', function () {
                  var modalForm = new bootstrap.Modal(document.getElementById('modalForm'), {
                      keyboard: false
                  })

                  window.addEventListener('closeModal', event => {
                      modalForm.hide() 
                  });

                  window.addEventListener('openModal', event => {
                      modalForm.show()  
                  }); 
                })
            </script>
            </div>
           