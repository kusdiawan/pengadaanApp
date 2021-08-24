<!-- Modal -->
<div class="modal fade" id="ubahModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/ubahPengadaan" method="post" role="form" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="id_pengadaan" id="id_pengadaan" class="id_pengadaan">
      <div class="modal-body">
        
                <div class="card-body">
                     <div class="form-group">
                    <label>Nama Pengadaan</label>
                    <input type="text" name="u_nama_pengadaan" class="form-control nama_pengadaan"  id="u_nama_pengadaan" placeholder="Masukan Nama">
                  </div>

                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="u_deskripsi" name="u_deskripsi" class="form-control deskripsi">
                    </textarea>
                  </div>

                   <div class="form-group">
                    <label>Anggaran:<input type="" class="labelRp" disabled style="border:none; background-color:white; color: black;"> </label>
                    <input type="text" name="u_anggaran" class="form-control anggaran" id="u_anggaran" placeholder="Masukan Anggaran" onkeyup="curency2()">
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