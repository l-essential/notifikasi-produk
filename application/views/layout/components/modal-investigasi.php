<div class="modal" tabindex="-1" role="dialog" id="modal-investigasi">
  <div class="modal-dialog" role="document">
    <?php echo form_open(); ?>

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Investigasi</h5>
        </div>

        <div class="modal-body">
          <p class="masalah">Detail Masalah</p>

          <div class="input-reason" style="margin-top: 10px;">
            <textarea id="form-field-11" placeholder="Detail Masalah ..." name="detail_masalah" class="autosize-transition form-control" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 52px;"></textarea>
          </div>
          <p class="usulan">Usulan Perbaikan</p>

          <div class="input-reason" style="margin-top: 10px;">
            <textarea id="form-field-11" placeholder="Usulan Perbaikan ..." name="usulan_perbaikan" class="autosize-transition form-control" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 52px;"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <input type="hidden" name="no_transaksi" class="id-trx" value="">
          <button type="submit" class="btn btn-danger">Simpan</button>
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </div>
      </div>

    <?php echo form_close(); ?>
  </div>
</div>
