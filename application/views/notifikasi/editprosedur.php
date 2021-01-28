<div class="page-header">
<h4>
    Edit Prosedur
</h4>
</div><!-- /.page-header -->

<form method="POST" action="<?= base_url('fnp/notifikasi/editprosedur/'); ?><?= $getitem[0]['idprosedur']; ?>/<?= $merekbyid[0]['idmerek']; ?>" data-parsley-validate="true">
            
    <div class="form-group">
        <label for="message-text" class="form-control-label">Prosedur Pembuatan<span id="merah">*</span></label>
        <input type="text" name="prosedur" id="prosedur" class="form-control" placeholder="Prosedur Pembuatan" value="<?= $getitem[0]['prosedur']; ?>" required>
        <?= form_error('prosedur', '<small class="text-danger pl-3">', '</small>')?>
    </div>

    <div class="row">
        <div class="col-sm-12 center">
            <div class="form-actions">
                <a href="<?= base_url('fnp/notifikasi/addkomposisi'); ?>/<?= $merekbyid[0]['idmerek']; ?>" class="btn btn-danger"><i class='icon-only ace-icon fa fa-arrow-left bigger-110'></i> Batal</a>

                <button type="submit" name="submit" class="btn btn-success"><i class='icon-only ace-icon fa fa-save bigger-110'></i> Simpan</button>
            </div>
        </div>
    </div>

</form>