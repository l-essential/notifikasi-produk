<?php 
  $NIK = $this->session->userdata('NIK');
  $group = $this->session->userdata('id_group');
?>

<div class="page-header">
  <h1>
    Formula Notifikasi Produk 
  </h1>
</div><!-- /.page-header -->

<div id="page">
    <form method="POST" action="<?= base_url('fnp/notifikasi/addmerek')?>" data-parsley-validate="true" enctype="multipart/form-data">
        <fieldset>
            <div class="content list-no-order">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Merek<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-copyright bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name='namamerek' value="<?= set_value('namamerek')?>" style="text-transform:uppercase">
                                <?= form_error('namamerek', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Nama Produk<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-truck bigger-110"></i>
                                </span>
                                <input type="text"  class="form-control" name='namaproduk' value="">
                                <?= form_error('namaproduk', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Bentuk Sediaan<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <select name="bentuksediaan" class="chosen-select form-control">
                                    <option>Bentuk Sediaan</option>
                                    <?php foreach ($databs as $bs) { ?>
                                    <option value="<?= $bs['bentuksediaan']; ?>"><?= $bs['bentuksediaan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Warna Sediaan<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-eyedropper bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name='warnasediaan' value="">
                                <?= form_error('warnasediaan', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Kategori</label>
                            <div class="col-sm-8 input-group">
                                <input type="text"  class="form-control" name='kategori' value="" <?php if($group != 3){echo 'readonly';} ?>>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Sub Kategori</label>
                            <div class="col-sm-8 input-group">
                                <input type="text" class="form-control" name='subkategori' value="">
                            </div>
                        </div> -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">No. Formula<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-qrcode bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name='noformula' value="">
                                <?= form_error('noformula', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">No. Revisi<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-qrcode bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name='norevisi' value="">
                                <?= form_error('norevisi', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Tanggal berlaku<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                                <input type="text" class="form-control date-picker" name='tglberlaku' value="">
                                <?= form_error('tglberlaku', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Formula Khusus<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-flask bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name='formulakhusus' value="">
                                <?= form_error('formulakhusus', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Persamaan Produk<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <input type="text" class="form-control" name='persamaanproduk' value="">
                                <?= form_error('persamaanproduk', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="page-header">
                <h4>
                    Klaim Produk 
                </h4>
                </div><!-- /.page-header -->
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">klaim Produk<span id="merah">*</span></label>
                    <div class="col-sm-10 input-group">
                        <input type="text" class="form-control" name='klaimproduk' value="">
                        <?= form_error('klaimproduk', '<small class="text-danger pl-3">', '</small>')?>
                    </div>
                </div>
                    

                <div class="page-header">
                <h4>
                    Cara Pakai 
                </h4>
                </div><!-- /.page-header -->
                    
                    
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Cara pakai<span id="merah">*</span></label>
                    <div class="col-sm-10 input-group">
                        <input type="text" class="form-control" name='carapakai' value="">
                        <?= form_error('carapakai', '<small class="text-danger pl-3">', '</small>')?>
                    </div>
                </div>
                    

                <div class="page-header">
                <h4>
                    Perhatian / Peringatan 
                </h4>
                </div><!-- /.page-header -->

                    
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Perhatian / Peringatan<span id="merah">*</span></label>
                    <div class="col-sm-10 input-group">
                        <input type="text" class="form-control" name='perhatian' value="">
                        <?= form_error('perhatian', '<small class="text-danger pl-3">', '</small>')?>
                    </div>
                </div>
                    

                <div class="page-header">
                <h4>
                    Catatan 
                </h4>
                </div><!-- /.page-header -->

                    
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Catatan<span id="merah">*</span></label>
                    <div class="col-sm-10 input-group">
                        <textarea type="text" class="form-control" name='catatan' value=""></textarea>
                        <?= form_error('catatan', '<small class="text-danger pl-3">', '</small>')?>
                    </div>
                </div>
            </div> 

            <div class="page-header">
                <h4>
                    Upload Literatur (CPD) 
                </h4>
                </div><!-- /.page-header -->

                <div class="form-group">
                    <div class="col-sm-10 input-group">
                        <input type="file" name="filepdf" id="filepdf" accept=".pdf">
                    </div>
                </div>
        </fieldset>

        <div class="row">
            <div class="col-sm-12 center">
                <div class="form-actions">
                    <a href="<?= base_url('fnp/notifikasi/'); ?>" name="submit" class="btn btn-danger"><i class='icon-only ace-icon fa fa-arrow-left bigger-110'></i> Kembali</a>
                    
                    <button type="submit" name="submit" class="btn btn-success"><i class='icon-only ace-icon fa fa-save bigger-110'></i> Simpan</button>
                </div>
            </div>
        </div>

    </form>
</div>
    
    