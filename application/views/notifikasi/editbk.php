<?php 
  $NIK = $this->session->userdata('NIK');
  $group = $this->session->userdata('id_group');
?>

<div class="page-header">
  <h1>
    Edit Data Merek 
  </h1>
</div><!-- /.page-header -->

<div id="page">
<form method="POST" action="<?= base_url('fnp/notifikasi/editbk/'); ?><?= $merekbyid[0]['idmerek']; ?>/<?= $edit[0]['idbk']; ?>" data-parsley-validate="true">   
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right">Bentuk Kemasan<span id="merah">*</span></label>
            <div class="col-sm-8 input-group">
                <select name="primer" class=" form-control">
                    <option value="<?= $edit[0]['primer']?>"><?= $edit[0]['primer']?></option>
                    <?php foreach ($databk as $bk) { ?>
                    <option value="<?= $bk['bentukkemasan']; ?>"><?= $bk['bentukkemasan']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right"></label>
            <div class="col-sm-8 input-group">
                <label for="" style="margin-right: 10px"><b>Sekunder :</b></label>
                <?php if($edit[0]['sekunder'] == 'Inner Box'){?>
                <input type="radio" name="sekunder" value="Inner Box" style="margin-right: 5px" <?= 'checked';?> > <b style="margin-right: 20px">Inner Box</b> 
                <input type="radio" name="sekunder" value="Tidak" style="margin-right: 5px"><b>Tidak</b>
                <?php }else{ ?>
                <input type="radio" name="sekunder" value="Inner Box" style="margin-right: 5px"> <b style="margin-right: 20px">Inner Box</b> 
                <input type="radio" name="sekunder" value="Tidak" style="margin-right: 5px"  <?= 'checked';?> ><b>Tidak</b>
                <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right">Ukuran Kemasan<span id="merah">*</span></label>
            <div class="col-sm-8 input-group">
                <input type="number" class="form-control" name='ukurankemasan' value="<?= $edit[0]['ukurankemasan']; ?>">
                <?= form_error('ukurankemasan', '<small class="text-danger pl-3">', '</small>')?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right"></label>
            <div class="col-sm-8 input-group">
                <label for="" style="margin-right: 10px"><b>Satuan :</b></label>
                <?php if($edit[0]['satuan'] == 'Mililiter'){?>
                <input type="radio" name="satuan" id="satuan" value="Mililiter" style="margin-right: 5px" <?= 'checked';?> > <b style="margin-right: 20px">Mililiter</b> 
                <input type="radio" name="satuan" id="satuan" value="Gram" style="margin-right: 5px"><b>Gram</b>
                <?php }else{ ?>
                <input type="radio" name="satuan" id="satuan" value="Mililiter" style="margin-right: 5px"> <b style="margin-right: 20px">Mililiter</b> 
                <input type="radio" name="satuan" id="satuan" value="Gram" style="margin-right: 5px" <?= 'checked';?>><b>Gram</b>
                <?php }?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12 center">
                <div class="form-actions">
                    <a href="<?= base_url('fnp/notifikasi/addbk/'); ?><?= $merekbyid[0]['idmerek']; ?>" name="submit" class="btn btn-danger"><i class='icon-only ace-icon fa fa-arrow-left bigger-110'></i> Kembali</a>
                    
                    <button type="submit" name="submit" class="btn btn-success"><i class='icon-only ace-icon fa fa-save bigger-110'></i> Simpan</button>
                </div>
            </div>
        </div>

        </form>
</div>