<div class="page-header">
 <h1>Edit<small><i class="ace-icon fa fa-angle-double-right"></i>Group</small></h1></div>
 <!-- /.page-header -->
 <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
  <div class="row">
    <div class="col-xs-12">
 <!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" method="POST" action="<?php echo base_url('user/group/edit/'.$group->id_group); ?>" data-parsley-validate="true">
 <div class="form-group">
 <input type="hidden" name="id_group" value="<?php echo $group->id_group ?>">
  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Group <span id="merah">*</span></label>
   <div class="col-sm-5">
     <input type="text" name="nama_group" placeholder="Nama Group" data-parsley-required="true" minlength="2" value="<?php echo $group->nama_group ?>" data-parsley-minlength="2" class="col-md-12">
     </div>
   </div>
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Keterangan</label>
     <div class="col-sm-5">
       <input type="text" name="keterangan" placeholder="Keterangan" class="col-md-12" value="<?php echo $group->keterangan ?>">
     </div>         
    </div>
   <div class="clearfix form-actions">
     <div class="col-md-offset-3 col-md-9">
       <button class="btn btn-info" type="submit">
         <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
          &nbsp; &nbsp; &nbsp;
      <a href="<?= base_url() ?>user/group" button class="btn btn-danger" type="submit"><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>
    </div>
   </div>
</form>
</div>
</div>      