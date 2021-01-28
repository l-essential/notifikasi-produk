<div class="page-header">
<h4>
    Edit Komposisi
</h4>
</div><!-- /.page-header -->

<form method="POST" action="<?= base_url('fnp/notifikasi/editkomposisi/'); ?><?= $getitem[0]['idkomposisi']; ?>/<?= $merekbyid[0]['idmerek']; ?>" enctype="form-data/multipart" data-parsley-validate="true">
          
    <div class="form-group">
    <label for="message-text" class="form-control-label">Nama Dagang<span id="merah">*</span></label>
    <input type="text" class="form-control" placeholder="Nama Dagang" name="namadagang" value="<?= $getitem[0]['namadagang']; ?>" >
    <?= form_error('namadagang', '<small class="text-danger pl-3">', '</small>')?>
    </div>

    <div class="form-group">
    <input type="hidden" name="id_group">
    <label for="message-text" class="form-control-label">INCI Name<span id="merah">*</span></label>
    <input type="text" class="form-control" placeholder="INCI Name" name="inciname" value="<?= $getitem[0]['inciname']; ?>" >
    <?= form_error('inciname', '<small class="text-danger pl-3">', '</small>')?>
    </div>

    <div class="form-group">
    <input type="hidden" name="id_group">
    <label for="message-text" class="form-control-label">Fungsi<span id="merah">*</span></label>
    <input type="text" class="form-control" placeholder="Fungsi" name="fungsi" value="<?= $getitem[0]['fungsi']; ?>" >
    <?= form_error('fungsi', '<small class="text-danger pl-3">', '</small>')?>
    </div>

    <div class="form-group">
    <label for="message-text" class="form-control-label">No. CAS<span id="merah">*</span></label>
    <input type="text" class="form-control" placeholder="No. CAS" name="nocas" value="<?= $getitem[0]['nocas']; ?>" >
    <?= form_error('nocas', '<small class="text-danger pl-3">', '</small>')?>
    </div>     

    <div class="form-group">
    <label for="message-text" class="form-control-label">Konsentrasi (%)<span id="merah">*</span></label>
    <input type="text" class="form-control" placeholder="Konsentrasi (%)" name="konsentrasi" value="<?= $getitem[0]['konsentrasi']; ?>" >
    <?= form_error('konsentrasi', '<small class="text-danger pl-3">', '</small>')?>
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