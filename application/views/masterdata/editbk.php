<?php 
$NIK        = $this->session->userdata('NIK');
?>
<div class="page-header">
  <h1>
    Form Edit Data Bentuk Kemasan 
  </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col">
        <!-- PAGE CONTENT BEGINS -->
        <form method="post" class="form-horizontal" action="<?= base_url() . 'fnp/masterdata/editbk/' . $databk['idbk']; ?>" enctype="form-data/multipart" data-parsley-validate="true">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bentuk kemasan </label>

                <div class="col-sm-9">
                    <input type="text" name="bentukkemasan" id="bentukkemasan" placeholder="Bentuk kemasan" class="col-xs-10 col-sm-5" value="<?= $databk['bentukkemasan']; ?>" required/>
                </div>
            </div>

            <div class="space-4"></div>
            <div class="row">
            <div class="col-sm-12 center">
                <div class="form-actions">
                    <a href="<?= base_url('fnp/masterdata/masterbk'); ?>" name="submit" class="btn btn-danger"><i class='icon-only ace-icon fa fa-arrow-left bigger-110'></i> Kembali</a>
                    
                    <button type="submit" name="submit" class="btn btn-success"><i class='icon-only ace-icon fa fa-save bigger-110'></i> Simpan</button>
                </div>
            </div>
        </div>
        </form>
    </div><!-- /.col -->
</div><!-- /.row -->