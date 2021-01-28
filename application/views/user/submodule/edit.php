<div class="page-header">
 <h1>Edit<small><i class="ace-icon fa fa-angle-double-right"></i>Subsubmodule</small></h1></div>
 <!-- /.page-header -->
 <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
  <div class="row">
    <div class="col-xs-12">
 <!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" method="POST" action="<?php echo base_url('user/submodule/edit/'.$submodule->id_submodule); ?>" data-parsley-validate="true">
 <div class="form-group">
 <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Module<span id="merah">*</span></label>
   <div class="col-sm-5">
     <select class="chosen-select form-control" id="form-field-select-3" data-parsley-validate="true" name="id_module" data-placeholder="Pilih Module...">
      <?php foreach ($module as $module ) {?>
      <option></option>
      <option value="<?php echo $module->id_module ?>"
      <?php if ($submodule->id_module==$module->id_module) { echo "selected"; } ;?>>
      <?php echo $module->nama_module ?></option> 
      <?php } ?> 
   </select>
     </div>
   </div>
<div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Submodule</label>
   <div class="col-sm-5">
     <input type="text" name="nama_submodule" placeholder="Nama Submodule" value="<?php echo $submodule->nama_submodule ?>" class="col-md-12">
   </div>
  </div>
  <div class="form-group">
   <label class="col-sm-3 control-label no-padding-right">URL</label>
   <div class="col-sm-5">
   <input type="text" class="form-control" placeholder="URL" name="url_sub" value="<?php echo $submodule->url_sub; ?>">
 </div>
</div>
<div class="form-group">
 <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Form<span id="merah">*</span></label>
   <div class="col-sm-5">
     <select class="chosen-select form-control" id="form-field-select-3" data-parsley-validate="true" name="jenis_form" data-placeholder="Pilih Module...">
      <option></option>
      <option value="Input" <?php if($submodule->jenis_form=="Input") { echo "selected"; } ?>>Input</option>
      <option value="Laporan" <?php if($submodule->jenis_form=="Laporan") { echo "selected"; } ?>>Laporan</option>
      <option value="Module" <?php if($submodule->jenis_form=="Module") { echo "selected"; } ?>>Module</option>
      <option value="Grafik" <?php if($submodule->jenis_form=="Grafik") { echo "selected"; } ?>>Grafik</option>
   </select>
     </div>
   </div>
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Urutan</label>
     <div class="col-sm-5">
       <input type="text" name="urutan" placeholder="Urutan" class="col-md-12" value="<?php echo $submodule->urutan; ?>">
     </div>         
    </div>
   <div class="clearfix form-actions">
     <div class="col-md-offset-3 col-md-9">
       <button class="btn btn-info" type="submit">
         <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
          &nbsp; &nbsp; &nbsp;
      <a href="<?= base_url() ?>user/submodule" button class="btn btn-danger" type="submit"><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>
    </div>
   </div>
</form>
</div>
</div>      