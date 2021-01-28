<div class="page-header">
 <h1>Ubah <small><i class="ace-icon fa fa-angle-double-right"></i>Password</small></h1></div>
 <!-- /.page-header -->
<?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>
  <div class="row">
    <div class="col-xs-12">
 
  <!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>ubah_password/change_password" data-parsley-validate="true">
 <div class="form-group">
  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password Lama<span id="merah">*</span></label>
   <div class="col-sm-5">
     <input type="password" name="password_lama" placeholder="Password Lama" data-parsley-required="true" minlength="2" data-parsley-minlength="2" class="col-md-12" >
     </div>
   </div>  
   <div class="form-group">
  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password Baru<span id="merah">*</span></label>
   <div class="col-sm-5">
     <input type="password" data-parsley-minlength="2" minlength="2" id="password" placeholder="Password" data-parsley-required="true" class="col-md-12">
     </div>
   </div>
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right"> Konfirmasi Password Baru<span id="merah">*</span></label>
     <div class="col-sm-5">
       <input type="password" name="password_baru" placeholder="Confirm Password" data-parsley-required="true" data-parsley-equalto="#password" class="col-md-12">
     </div>         
    </div>
   <div class="clearfix form-actions">
     <div class="col-md-offset-3 col-md-9">
       <button class="btn btn-info" type="submit">
         <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
          &nbsp; &nbsp; &nbsp;
      <a href="<?= base_url() ?>dashboard" button class="btn btn-danger" type="submit"><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>
    </div>
  </div>  
</form>
</div>
 </div>
      