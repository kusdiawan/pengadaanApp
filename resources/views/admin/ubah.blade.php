<!-- Modal -->
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/ubahAdmin" id="ubahModal"  method="post" role="form" >
      {{ csrf_field() }}

      <input type="hidden" name="id_admin" id="id_admin" class="id_admin">

      <div class="modal-body">
          <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="u_nama" class="form-control nama" id="u_nama" placeholder="Masukan Nama">
                  </div>
          
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="u_email" class="form-control email" id="u_email" placeholder="Masukan email">
                  </div>
          
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="u_alamat" id="u_alamat" class="form-control alamat" rows="3" placeholder="Masukan Alamat Lengkap"></textarea>
                  </div>

        </div>

        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        
        </form>
      </div>
    </div>
  </div>
</div>