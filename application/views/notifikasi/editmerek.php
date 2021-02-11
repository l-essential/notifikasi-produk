<?php 
  $NIK = $this->session->userdata('NIK');
  $group = $this->session->userdata('id_group');
?>

<div class="page-header">
  <h1>
    <?= $sub_judul1; ?> 
  </h1>
</div><!-- /.page-header -->

<?= $this->session->flashdata('message'); ?>

<div id="page">
    <form method="POST" action="<?= base_url('fnp/notifikasi/editmerek/')?><?= $merek['idmerek']; ?>" data-parsley-validate="true" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name='namamerek' value="<?= $merek['namamerek']; ?>" style="text-transform:uppercase" <?php if($group == 3){echo 'readonly';} ?> >
                                <?= form_error('namamerek', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Nama Produk<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-truck bigger-110"></i>
                                </span>
                                <input type="text"  class="form-control" name='namaproduk' value="<?= $merek['namaproduk']; ?>" <?php if($group == 3){echo 'readonly';} ?>>
                                <?= form_error('namaproduk', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Bentuk Sediaan<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <select name="bentuksediaan" class="chosen-select form-control" >
                                    <option value="<?= $merek['bentuksediaan']; ?>" ><?= $merek['bentuksediaan']; ?></option>
                                    
                                    <?php if($group != 3){?>
                                        <?php foreach ($databs as $bs) { ?>
                                        <option value="<?= $bs['bentuksediaan']; ?>"><?= $bs['bentuksediaan']; ?></option>
                                        <?php } ?>
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
                                <input type="text" class="form-control" name='warnasediaan' value="<?= $merek['warnasediaan']; ?>" <?php if($group == 3){echo 'readonly';} ?>>
                                <?= form_error('warnasediaan', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Kategori</label>
                            <div class="col-sm-8 input-group">
                                <input type="text"  class="form-control" name='kategori' value="<?= $merek['kategori']; ?>" <?php if($group == 4 || $group == 2){echo 'readonly';} ?>>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Sub Kategori</label>
                            <div class="col-sm-8 input-group">
                                <input type="text" class="form-control" name='subkategori' value="<?= $merek['subkategori']; ?>">
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
                                <input type="text" class="form-control" name='noformula' value="<?= $merek['noformula']; ?>" <?php if($group == 3){echo 'readonly';} ?>>
                                <?= form_error('noformula', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">No. Revisi<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-qrcode bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name='norevisi' value="<?= $merek['norevisi']; ?>" <?php if($group == 3){echo 'readonly';} ?>>
                                <?= form_error('norevisi', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Tanggal berlaku<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                                <input type="text" class="form-control date-picker" name='tglberlaku' value="<?= date('d F Y', strtotime($merek['tglberlaku'])); ?>" <?php if($group == 3){echo 'readonly';} ?>>
                                <?= form_error('tglberlaku', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Formula Khusus<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-flask bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name='formulakhusus' value="<?= $merek['noformula']; ?>" <?php if($group == 3){echo 'readonly';} ?>>
                                <?= form_error('formulakhusus', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right">Persamaan Produk<span id="merah">*</span></label>
                            <div class="col-sm-8 input-group">
                                <textarea type="text" class="form-control" name='persamaanproduk' <?php if($group == 3){echo 'readonly';} ?> ><?= $merek['persamaanproduk']; ?></textarea>
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
                        <input type="text" class="form-control" name='klaimproduk' value="<?= $merek['klaimproduk']; ?>" <?php if($group == 3){echo 'readonly';} ?>>
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
                        <input type="text" class="form-control" name='carapakai' value="<?= $merek['carapakai']; ?>"  <?php if($group == 3){echo 'readonly';} ?>>
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
                        <input type="text" class="form-control" name='perhatian' value="<?= $merek['perhatian']; ?>"  <?php if($group == 3){echo 'readonly';} ?>>
                        <?= form_error('perhatian', '<small class="text-danger pl-3">', '</small>')?>
                    </div>
                </div>
                    

                <div class="page-header">
                <h4>
                    Catatan 
                </h4>
                </div><!-- /.page-header -->

                    
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Catatan RnD<span id="merah">*</span></label>
                    <div class="col-sm-10 input-group">
                        <textarea type="text" class="form-control" name='catatan' <?php if($group == 3){echo 'readonly';} ?> ><?= $merek['catatan']; ?></textarea>
                        <?= form_error('catatan', '<small class="text-danger pl-3">', '</small>')?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Catatan RA<span id="merah">*</span></label>
                    <div class="col-sm-10 input-group">
                        <textarea type="text" class="form-control" name='catatanra' <?php if($group == 4 || $group == 2){echo 'readonly';} ?>><?= $merek['catatanra']; ?></textarea>
                        <?= form_error('catatanra', '<small class="text-danger pl-3">', '</small>')?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Catatan RnD Cometic Manager<span id="merah">*</span></label>
                    <div class="col-sm-10 input-group">
                        <textarea type="text" class="form-control" name='catatan_rndcm' <?php if($group == 4 || $group == 3){echo 'readonly';} ?>><?= $merek['catatan_rndcm']; ?></textarea>
                        <?= form_error('catatan_rndcm', '<small class="text-danger pl-3">', '</small>')?>
                    </div>
                </div>

                <div class="page-header">
                <h4>
                    Upload Literatur (CPD) 
                </h4>
                </div><!-- /.page-header -->

                <div class="form-group">
                    <p>
                    <b>File yang telah di upload : <?php if($merek['pdf'] == ''){echo "KOSONG";}else{ echo $merek['pdf'];} ?> </b>
                    
                    <?php if($merek['pdf'] != '' && $group != 3){?>
                    <a href="<?= base_url('fnp/notifikasi/delpdf/'); ?><?= $merek['idmerek']; ?>" class="btn-sm btn-danger no-radius" style="margin-left: 5px;" onclick="return confirm('Apakah kamu yakin akan menghapus file <?= $merek['pdf']; ?>?');"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                    </p>
                    <?php } ?>
                    
                    <div class="col-sm-10 input-group">
                        <input type="file" name="filepdf" id="filepdf" accept=".pdf" <?php if($group == 3){echo 'readonly';} ?>>
                    </div>
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

    
    