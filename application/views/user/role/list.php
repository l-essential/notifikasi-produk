<?php
$id_group = $group->id_group;
$cek_role = $this->role_model->listing_utama($id_group);
if(count($cek_role)>0) {
?>
<div class="row">
  <div class="col-xs-12">
    <h3 class="header smaller lighter blue">Role Akses >> <?php echo $group->nama_group; ?></h3>
    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>                    
      <div>
<?php echo form_open(base_url('user/role/edit/'.$group->id_group));
?>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th style="text-align:center" width="55">No</th>
<input type="hidden" name="id_role">
<th style="text-align:center" width="300">Module</th>
<th style="text-align:center" width="100">View<br><input type="checkbox" onClick="checkAll('view', this.checked)" /></th>
<th style="text-align:center" width="100">Tambah<br><input type="checkbox" onClick="checkAll2('tambah', this.checked)" /></th>
<th style="text-align:center" width="100">Edit<br><input type="checkbox" onClick="checkAll3('edit', this.checked)" /></th>
<th style="text-align:center" width="100">Delete<br><input type="checkbox" onClick="checkAll4('delete', this.checked)" /></th>
</tr>
<?php
$no = 1; foreach($module as $module) {
$id_module    = $module->id_module;
$akses_module = $this->role_model->akses_module($id_group,$id_module);
?>
<tr>
<th style="text-align:center"><?= $no; ?>
 <th><b><i class="menu-icon fa <?php echo $module->logo ?>"></i> <?php echo $module->nama_module ?></b></th>
 <input type="hidden" name="id_module_<?php echo $module->id_module ?>" value="<?php echo $module->id_module ?>">
 <?php if(count(array($akses_module))>0) { ?>
 <th style="text-align:center"><input type="checkbox" class="view" value="1" name="view_module_<?php echo $module->id_module; ?>" <?php echo set_value('view_module',$akses_module->view_module) == '1' ? "checked" : ""; ?> /></th>
 <?php }else{ ?>
 <th style="text-align:center"><input type="checkbox" class="view" value="1" name="view_module_<?php echo $module->id_module; ?>" /></th>
 <?php }; ?>
 <th></th>
 <th></th>
 <th></th>
</tr>
</thead>
<tbody> 
<?php 
$submodule       = $this->submodule_model->listing_module($id_module);
foreach($submodule as $submodule) { 
$id_submodule    = $submodule->id_submodule;
$id_group        = $group->id_group;
$akses_submodule = $this->role_model->akses_submodule($id_group,$id_module,$id_submodule);
?>
<tr>
<?php if ($submodule->jenis_form == "Module") { ?>
<input type="hidden" name="id_submodule_<?php echo $submodule->id_submodule ?>" value="<?php echo $submodule->id_submodule ?>">
  <?php echo ""; ?>
  <?php }else { ?>
  <td></td>
  <td>> <?php echo $submodule->nama_submodule ?></td>    
<input type="hidden" name="id_group" value="<?php echo $group->id_group ?>">
<input type="hidden" name="id_submodule_<?php echo $submodule->id_submodule ?>" value="<?php echo $submodule->id_submodule ?>">
<?php if(count(array($akses_submodule))>0){ ?>
<td align="center"><input type="checkbox" class="view" value="1" name="submodule_view_<?php echo $submodule->id_submodule; ?>" <?php echo set_value('view_module',$akses_submodule->r) == '1' ? "checked" : ""; ?> />
<?php if($submodule->jenis_form != "Input") { ?>
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
<?php }else{ ?>
<td align="center"><input type="checkbox" class="tambah" value="1" name="submodule_tambah_<?php echo $submodule->id_submodule; ?>" <?php echo set_value('view_module',$akses_submodule->c) == '1' ? "checked" : ""; ?> /></td>
<td align="center"><input type="checkbox" class="edit" value="1" name="submodule_edit_<?php echo $submodule->id_submodule; ?>" <?php echo set_value('view_module',$akses_submodule->u) == '1' ? "checked" : ""; ?> /></td>
<td align="center"><input type="checkbox" class="delete" value="1" name="submodule_delete_<?php echo $submodule->id_submodule; ?>" <?php echo set_value('view_module',$akses_submodule->d) == '1' ? "checked" : ""; ?> /></td>
<?php }; }else{ ?>
<td align="center"><input type="checkbox" class="view" value="1" name="submodule_view_<?php echo $submodule->id_submodule; ?>" /></td>
<?php if($submodule->jenis_form == "Input") { ?>
<td align="center"><input type="checkbox" class="tambah" value="1" name="submodule_tambah_<?php echo $submodule->id_submodule; ?>" /></td>
<td align="center"><input type="checkbox" class="edit" value="1" name="submodule_edit_<?php echo $submodule->id_submodule; ?>" /></td>
<td align="center"><input type="checkbox" class="delete" value="1" name="submodule_delete_<?php echo $submodule->id_submodule; ?>" /></td>
<?php }else{ ?>
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
<?php }; }; }; }; ?>
</tr>
<?php $no++; }; ?>
</tbody>
  </table>
  </div>
</div>
<div class="col-md-offset-3 col-md-9">
       <button class="btn btn-info" type="submit">
         <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
          &nbsp; &nbsp; &nbsp;
      <a href="<?= base_url() ?>user/group" button class="btn btn-danger" type="submit"><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>
    </div>
</div>
<?php echo form_close(); ?>
<?php }else{ ?>
<div class="row">
  <div class="col-xs-12">
    <h3 class="header smaller lighter blue">Role Akses >> <?php echo $group->nama_group; ?></h3>
    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>                    
      <div>
<?php echo form_open(base_url('user/role/tambah/'.$group->id_group));
?>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th style="text-align:center" width="55">No</th>
<input type="hidden" name="id_role">
<th style="text-align:center" width="300">Module</th>
<th style="text-align:center" width="100">View<br><input type="checkbox" onClick="checkAll('view', this.checked)" /></th>
<th style="text-align:center" width="100">Tambah<br><input type="checkbox" onClick="checkAll2('tambah', this.checked)" /></th>
<th style="text-align:center" width="100">Edit<br><input type="checkbox" onClick="checkAll3('edit', this.checked)" /></th>
<th style="text-align:center" width="100">Delete<br><input type="checkbox" onClick="checkAll4('delete', this.checked)" /></th>
</tr>
<?php
$no = 1; foreach($module as $module) {
$id_module    = $module->id_module;
$akses_module = $this->role_model->akses_module($id_group,$id_module);
?>
<tr>
<th style="text-align:center"><?= $no; ?>
 <th><b><i class="menu-icon fa <?php echo $module->logo ?>"></i> <?php echo $module->nama_module ?></b></th>
 <input type="hidden" name="id_module_<?php echo $module->id_module ?>" value="<?php echo $module->id_module ?>">
 <th style="text-align:center"><input type="checkbox" class="view" value="1" name="view_module_<?php echo $module->id_module; ?>" /></th>
 <th></th>
 <th></th>
 <th></th>
</tr>
</thead>
<tbody> 
<?php 
$submodule       = $this->submodule_model->listing_module($id_module);
foreach($submodule as $submodule) { 
$id_submodule    = $submodule->id_submodule;
$id_group        = $group->id_group;
$akses_submodule = $this->role_model->akses_submodule($id_group,$id_module,$id_submodule);
?>
<tr>
<?php if ($submodule->jenis_form == "Module") { ?>
<input type="hidden" name="id_submodule_<?php echo $submodule->id_submodule ?>" value="<?php echo $submodule->id_submodule ?>">
  <?php echo "";
   ?>
  <?php }else { ?>
  <td></td>
  <td>> <?php echo $submodule->nama_submodule ?></td>    
<input type="hidden" name="id_group" value="<?php echo $group->id_group ?>">
<input type="hidden" name="id_submodule_<?php echo $submodule->id_submodule ?>" value="<?php echo $submodule->id_submodule ?>">
<td align="center"><input type="checkbox" class="view" value="1" name="submodule_view_<?php echo $submodule->id_submodule; ?>" /></td>
<?php if($submodule->jenis_form == "Input"){ ?>
<td align="center"><input type="checkbox" class="tambah" value="1" name="submodule_tambah_<?php echo $submodule->id_submodule; ?>" /></td>
<td align="center"><input type="checkbox" class="edit" value="1" name="submodule_edit_<?php echo $submodule->id_submodule; ?>" /></td>
<td align="center"><input type="checkbox" class="delete" value="1" name="submodule_delete_<?php echo $submodule->id_submodule; ?>" /></td>
<?php }else{ ?>
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
<?php }; }; };  ?>
</tr>
<?php $no++; }; ?>
</tbody>
  </table>
  </div>
</div>
<div class="col-md-offset-3 col-md-9">
       <button class="btn btn-info" type="submit">
         <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
          &nbsp; &nbsp; &nbsp;
      <a href="<?= base_url() ?>user/group" button class="btn btn-danger" type="submit"><i class="ace-icon fa fa-undo bigger-110"></i>Cancel</button></a>
    </div>
</div>
<?php echo form_close(); }; ?>
<script type="text/javascript">
function checkAll(type, condition) {
  checkboxes = document.getElementsByClassName('view');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = condition;
  }
}
function checkAll2(type, condition) {
  checkboxes = document.getElementsByClassName('tambah');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = condition;
  }
}
function checkAll3(type, condition) {
  checkboxes = document.getElementsByClassName('edit');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = condition;
  }
}
function checkAll4(type, condition) {
  checkboxes = document.getElementsByClassName('delete');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = condition;
  }
}
</script>
