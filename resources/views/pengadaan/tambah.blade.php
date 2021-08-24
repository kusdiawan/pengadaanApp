<!-- Modal -->
<div class="modal fade" id="pengadaanModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/tambahPengadaan" method="post" role="form" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="modal-body">
        
                <div class="card-body">
                     <div class="form-group">
                    <label>Nama Pengadaan</label>
                    <input type="text" name="nama_pengadaan" class="form-control" id="nama_pengadaan" placeholder="Masukan Nama">
                  </div>

                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control">
                    </textarea>
                  </div>

                  <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="gambar" accept="image/png, image/jpg, image/gif">
                  </div>

                   <div class="form-group">
                    <label>Anggaran:<input type="" class="labelRp" disabled style="border:none; background-color:white; color: black;"> </label>
                    <input type="text" name="anggaran" class="form-control" id="anggaran" placeholder="Masukan Anggaran" onkeyup="curency()">
                  </div>


   
                </div>
                <!-- /.card-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
  </div>
</div>
</div>