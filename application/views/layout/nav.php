<?php  
$id_group  = $this->session->userdata('id_group');
$module    = $this->module_model->listing();
?>
<div class="main-container" id="main-container">
<script type="text/javascript">
	try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>
<div id="sidebar" class="sidebar                  responsive">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<h5><strong><?php date_default_timezone_set('Asia/Jakarta'); $d = date("d F Y"); echo $d; ?></strong></h5>
		</div>
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>
			<span class="btn btn-info"></span>
			<span class="btn btn-warning"></span>
			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->
<ul class="nav nav-list">
<?php 
foreach ($module as $module){
$menu_active 	= $module->url; 
$id_module 		= $module->id_module;
$submodule 		= $this->submodule_model->listing_module($id_module);
$role_module	= $this->role_model->akses_module($id_group,$id_module);

if(count((array)$role_module)>0){
if($role_module->view_module == "1"){
if($module->submodule == "Tidak"){
?>
<ul class="nav nav-list">
<li class="<?=($this->uri->segment(1)=== $menu_active)?'active':''?>">
<a href="<?php echo base_url(); ?><?php echo $module->url; ?>">
<i class="menu-icon fa <?php echo $module->logo ?>"></i>			
<span class="menu-text"><?php echo $module->nama_module; ?></span>
</a>
<b class="arrow"></b>
</li>
<?php }else{ ?>
<li class="<?=($this->uri->segment(1)=== $menu_active)?'active':''?>">
<a href="#" class="dropdown-toggle">
<i class="menu-icon fa <?php echo $module->logo ?>"></i>
<span class="menu-text"><?php echo $module->nama_module; ?></span>
<b class="arrow fa fa-angle-down"></b>
</a>
<b class="arrow"></b>
<ul class="submenu">
<b class="arrow"></b>
</li>
<?php
foreach ($submodule as $submodule) { 
$submodule_active = $submodule->url_sub;
$id_submodule     = $submodule->id_submodule;
$role_submodule   = $this->role_model->akses_submodule($id_group,$id_module,$id_submodule);
if(count((array)$role_submodule)>0){
if($role_submodule->r == "1"){
?>
<li class="<?=($this->uri->segment(2)=== $submodule_active )?'active':''?>">
<a href="<?=base_url(); ?><?php echo $module->url; ?>/<?php echo $submodule->url_sub; ?>">
<i class="menu-icon fa fa-caret-right"></i><?php echo $submodule->nama_submodule; ?></a><b class="arrow"></b>
</li>
<?php }else{ echo ""; }; }else{ echo ""; }; }; }; ?>
</ul>
<?php }else{ echo ""; }; }else{ echo ""; }; }; ?>
</ul>
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
  <script type="text/javascript">try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}</script>
</div>
<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs" id="breadcrumbs">
<script type="text/javascript">
	try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
</script>
<div id="with_print">
<ul class="breadcrumb">
	<li>
		<i class="ace-icon fa fa-home home-icon"></i>
		<a href="<?php echo base_url('dashboard'); ?>">Home</a>
	</li>
	<li>
		<a href="#"><?php echo $sub_judul ?></a>
	</li>
	<li class="active"><?php echo $sub_judul1 ?></li>
</ul><!-- /.breadcrumb -->
</div>
</div>
<div class="page-content">
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->								