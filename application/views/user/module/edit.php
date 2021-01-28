<div class="page-header">
 <h1>Edit<small><i class="ace-icon fa fa-angle-double-right"></i>Module</small></h1></div>
 <!-- /.page-header -->
 <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
  <div class="row">
    <div class="col-xs-12">
 <!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" method="POST" action="<?php echo base_url('user/module/edit/'.$module->id_module); ?>" data-parsley-validate="true">
 <div class="form-group">
  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Module <span id="merah">*</span></label>
   <div class="col-sm-5">
     <input type="text" name="nama_module" placeholder="Nama Module" data-parsley-required="true" minlength="2" value="<?php echo $module->nama_module ?>" data-parsley-minlength="2" class="col-md-12">
     </div>
   </div>
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">URL<span id="merah">*</span></label>
    <div class="col-sm-5">
   <input type="text" class="form-control" data-parsley-required="true" placeholder="URL" name="url" value="<?php echo $module->url ?>">
   </div>
 </div>
 <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Logo<span id="merah">*</span></label>
    <div class="col-sm-5">
   <input value="fa-desktop" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-desktop' ? "checked" : ""; ?> /><span class="lbl"><i class="menu-icon fa fa-desktop"></i></span> &nbsp;&nbsp; 
   <input value="fa-tachometer" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-tachometer' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-tachometer"></i></span>&nbsp;&nbsp;
<input value="fa-list" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-list' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-list"></i></span>&nbsp;&nbsp;
<input value="fa-pencil-square-o" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-pencil-square-o' ? "checked" : ""; ?>/><span class="lbl" ><i class="menu-icon fa fa-pencil-square-o"></i></span>&nbsp;&nbsp;
<input value="fa-list-alt" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-list-alt' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-list-alt"></i></span>&nbsp;&nbsp;
<input value="fa-picture-o" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-picture-o"></i></span>&nbsp;&nbsp;
<input value="fa-tag" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-tag' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-tag"></i></span>&nbsp;&nbsp;
<input value="fa-file-o" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-file-o' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-file-o"></i></span>&nbsp;&nbsp;
<input value="fa-user" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-user' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-user"></i></span>&nbsp;&nbsp;
<input value="fa-users" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-users' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-users"></i></span>&nbsp;&nbsp;
<input value="fa-eye" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-eye' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-eye"></i></span>&nbsp;&nbsp;
<input value="fa-pencil" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-pencil' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-pencil"></i></span>
<input value="fa-signal" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-signal' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-signal"></i></span>&nbsp;&nbsp;
<input value="fa-bookmark" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-bookmark' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-bookmark"></i></span>&nbsp;&nbsp;
<input value="fa-calendar" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-calendar' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-calendar"></i></span>&nbsp;&nbsp;
<input value="fa-cog" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-cog' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-cog"></i></span>&nbsp;&nbsp;
<input value="fa-cogs" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-cogs' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-cogs"></i></span>&nbsp;&nbsp;
<input value="fa-credit-card" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-credit-card' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-credit-card"></i></span>&nbsp;&nbsp;
<input value="fa-envelope" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-envelope"></i></span>&nbsp;&nbsp;
<input value="fa-folder-open " type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-folder-open' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-folder-open "></i></span>&nbsp;&nbsp;
<input value="fa-bullhorn" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-bullhorn' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-bullhorn"></i></span>&nbsp;&nbsp;
<input value="fa-briefcase" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-briefcase' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-briefcase"></i></span>&nbsp;&nbsp;
<input value="fa-download" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-download' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa   fa-download"></i></span>&nbsp;&nbsp;
<input value="fa-home" type="radio" name="logo" class="ace" data-parsley-required="true" <?php echo set_value('logo',$module->logo) == 'fa-home' ? "checked" : ""; ?> /><span class="lbl" ><i class="menu-icon fa fa-home"></i></span>
   </div>
 </div>
 <div class="form-group">
 <label class="col-sm-3 control-label no-padding-right">Submodule<span id="merah">*</span></label>
 <div class="col-sm-5">
  <select class="form-control" name="submodule" data-parsley-required="true">
    <option value="Ya">Ya</option>
      <option value="Tidak" <?php if($module->submodule=="Tidak") { echo "selected"; } ?> >Tidak</option> 
     </select>
   </div>
   </div>
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Urutan<span id="merah">*</span></label>
     <div class="col-sm-5">
       <input type="text" name="urutan" data-parsley-required="true" placeholder="Urutan" class="col-md-12" value="<?php echo $module->urutan ?>">
     </div>         
    </div>
   <div class="clearfix form-actions">
     <div class="col-md-offset-3 col-md-9">
       <button class="btn btn-info" type="submit">
         <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
          &nbsp; &nbsp; &nbsp;
      <a href="<?= base_url() ?>user/module" button class="btn btn-danger" type="submit"><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>
    </div>
   </div>
</form>
</div>
</div>      