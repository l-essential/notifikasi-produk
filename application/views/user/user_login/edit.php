<div class="page-header">
 <h1>Tambah <small><i class="ace-icon fa fa-angle-double-right"></i>Userlogin</small></h1></div>
 <!-- /.page-header -->
 <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
  <div class="row">
    <div class="col-xs-12">
 <!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" method="POST" action="<?php echo base_url('user/userlogin/edit/'.$userlogin->id_login); ?>" data-parsley-validate="true">
 <div class="form-group">
  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Karyawan</label>
   <div class="col-sm-5">
  <select class="chosen-select form-control" id="form-field-select-3" disabled="disabled" name="nik" data-placeholder="Pilih Nama Karyawan...">
      <option></option>
      <?php foreach ($karyawan as $karyawan ) {?>      
      <option value="<?php echo $karyawan->NIK ?>"
      <?php if ($userlogin->NIK==$karyawan->NIK) { echo "selected"; } ;?>>
      <?php echo $karyawan->namaKaryawan ?></option> 
      <?php } ?> 
   </select>
     </div>
   </div>
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Username<span id="merah">*</span></label>
     <div class="col-sm-5">
       <input type="text" class="form-control" data-parsley-required="true" placeholder="User Name" name="username" value="<?php echo $userlogin->username ?>">
     </div>         
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Password</label>
     <div class="col-sm-5">
      <input type="password" id="password" class="form-control" data-parsley-minlength="2" placeholder="Password">
     </div>         
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Confirm Password</label>
     <div class="col-sm-5">
      <input type="password" class="form-control" data-parsley-equalto="#password" placeholder="Confirm Password" name="password">
     </div>         
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">User Group<span id="merah">*</span></label>
     <div class="col-sm-5">
      <select class="chosen-select form-control" id="form-field-select-3" name="id_group" data-parsley-required="true" data-placeholder="Pilih User Group...">
      <?php foreach ($group as $group ) {?>
      <option></option>
      <option value="<?php echo $group->id_group ?>"
      <?php if ($userlogin->id_group==$group->id_group) { echo "selected"; } ;?>>
      <?php echo $group->nama_group ?></option> 
      <?php } ?> 
   </select>
     </div>         
    </div>
   <div class="clearfix form-actions">
     <div class="col-md-offset-3 col-md-9">
       <button class="btn btn-info" type="submit">
         <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
          &nbsp; &nbsp; &nbsp;
      <a href="<?= base_url() ?>user/userlogin" button class="btn btn-danger" type="submit"><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>
    </div>
   </div>
</form>
</div>
</div>     
