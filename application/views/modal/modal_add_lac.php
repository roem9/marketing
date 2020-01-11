<div class="modal fade" id="modal_add_lac" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah LAC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>lac/tambahlac" method="POST">
            <div class="form-group">
                <label for="nama">Nama LAC</label>
                <input class='form-control form-control-sm' type="text" name="nama" id="nama" autocomplete="off" autocorrect="off" autocapitalize="off" required>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm" id="tambahLac">Tambah</button>
            </div>
        </form>
    </div>
  </div>
</div>