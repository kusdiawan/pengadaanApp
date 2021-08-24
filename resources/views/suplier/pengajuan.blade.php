<!-- Modal -->
<div class="modal fade" id="pengajuanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengajuan Suplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/tambahPengajuan" method="post" role="form" enctype="multipart/form-data">
        {{csrf_field()}}

        <input type="hidden" name="id_pengadaan" id="id_pengadaan" class="id_pengadaan">
      <div class="modal-body">
        
                <div class="card-body">
                     <div class="form-group">
                    <label>Nama Pengadaan</label>
                    <input type="text" name="nama_pengadaan" class="form-control nama_pengadaan" id="nama_pengadaan" placeholder="Masukan Nama" disabled>
                  </div>

                   <div class="form-group">
                    <label>Anggaran:<input type="" class="labelRp" disabled style="border:none; background-color:white; color: black;"> </label>
                    <input type="text" name="anggaran" class="form-control anggaran" id="anggaran" placeholder="Masukan Anggaran" onkeyup="curency()">
                  </div>


                  <div class="form-group">
                    <label>Proposal</label>
                    <input type="file" name="proposal" class="form-control" id="proposal" accept="application/pdf">
                  </div>
   
                </div>
                <!-- /.card-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </div>
      </form>
    </div>
  </div>
</div>