<div class="modal" tabindex="-1" role="dialog" id="modal-confirm">
  <div class="modal-dialog" role="document">
    <?php echo form_open(); ?>

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="blue bigger modal-title">Konfirmasi Batal</h4>
        </div>

        <div class="modal-body">
          <p>Apa anda yakin ingin membatalkan data ini ?</p>

          <div class="input-reason" style="margin-top: 10px;">
            <input type="text" name="reason" value="" placeholder="Alasan" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <input type="hidden" name="id_produk" class="id-trx" value="">
          <button type="submit" class="btn btn-danger">Iya</button>
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </div>
      </div>

    <?php echo form_close(); ?>
  </div>
</div>
