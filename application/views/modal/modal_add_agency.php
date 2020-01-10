<div class="modal fade" id="modal_add_agency" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Agency</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>agency/tambahagency" method="POST">
            <div class="form-group">
                <label for="nama">Nama Agency</label>
                <input class='form-control form-control-sm' type="text" name="nama" id="nama" autocomplete="off" autocorrect="off" autocapitalize="off" required>
            </div>
            <div class="form-group">
                <label for="batch">Batch</label>
                <select name="batch" id="batch" class="form-control form-control-sm">
                    <option value="">Pilih Batch</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            </div>
        </form>
    </div>
  </div>
</div>