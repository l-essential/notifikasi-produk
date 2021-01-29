<div class="navbar-container" id="navbar-container">
<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
  <span class="sr-only">Toggle sidebar</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
<div class="navbar-header pull-left">
 <a href="<?php echo base_url('dashboard') ?>" class="navbar-brand">
 <small><img src="<?php echo base_url();?>assets/ico/icon3.png"><b> PT. L'ESSENTIAL HOLDING</b></small></a>
</div>
<?php
//Data User
$id_login       = $this->session->userdata('id');
if($id_login == 1){
$NIK = 'Admin';
}else{
$NIK            = $this->session->userdata('NIK');
}
$id_group       = $this->session->userdata('id_group');
$url_sub        = 'sim';
$akses_edit     = $this->role_model->view_submodule($id_group, $url_sub);
$foto           = $this->userlogin_model->karyawan_detail($NIK);
// $jumlah_kontrak = $this->status_karyawan_model->habis_kontrak();
// $jumlah_harian  = $this->status_karyawan_model->habis_harian();
?>

<?php if($id_group != 4 && $id_group != 1){?>

<div class="navbar-buttons navbar-header" role="navigation" style="margin-left: 60%; ">
<ul class="nav ace-nav">
  <li>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background-color: #438eb9;">
      <i class="ace-icon fa fa-bell icon-animated-bell"></i>
      <span class="badge badge-danger">
      <?php if($id_group == 2){ echo count($status_rnd); }else{ echo count($status_ra); }?>
      </span>
    </a>

    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
      <li class="dropdown-header">
        <i class="ace-icon fa fa-exclamation-triangle"></i>
        <?php if($id_group == 2){ echo count($status_rnd); }else{ echo count($status_ra); }?> Data Perlu disetujui
      </li>

      <li class="dropdown-content">
        <ul class="dropdown-menu dropdown-navbar navbar-red">
        <?php if ($id_group == 2){?>
          <?php foreach($status_rnd as $m){?>
          <li>
            <a href="<?= base_url('fnp/notifikasi'); ?>" class="clearfix">
              <h6 style="text-transform:uppercase"><b><?= $m['namamerek']; ?></b> <br> <span style="font-size: 10px"><?= $m['namaproduk']; ?></span></h6>
            </a>
          </li>
          <?php } ?>
        <?php }else{?>
          <?php foreach($status_ra as $m){?>
          <li>
            <a href="<?= base_url('fnp/notifikasi'); ?>" class="clearfix">
              <h6 style="text-transform:uppercase"><b><?= $m['namamerek']; ?></b><br> <span style="font-size: 10px"><?= $m['namaproduk']; ?></span></h6>
            </a>
          </li>
          <?php } ?>
        <?php }?>
        </ul>
      </li>

      <li class="dropdown-footer">
        <a href="<?= base_url('fnp/notifikasi'); ?>">
          Approve!
          <i class="ace-icon fa fa-arrow-right"></i>
        </a>
      </li>
    </ul>

</ul>
</div>
<?php } ?>


<div class="navbar-buttons navbar-header pull-right" role="navigation">
<ul class="nav ace-nav"> 

  <li class="light-blue">
   <a data-toggle="dropdown" href="#" class="dropdown-toggle">
   <?php 
   $baseurl = "http://192.168.0.91/lessential"; 
   if($id_login == 1){ ?>
   <?php echo '<img src="'.$baseurl.'/assets/upload/foto/thumbs/foto.jpg" class="nav-user-photo">'; }else{    
   if($foto->foto == ""){ ?>
   <?php echo '<img src="'.$baseurl.'/assets/upload/foto/thumbs/foto.jpg" class="nav-user-photo">'; ?>
   <?php }else{ ?>
   <?php echo '<img src="'.$baseurl.'/assets/upload/foto/thumbs/'.$foto->foto.'" class="nav-user-photo">'; ?>
   <?php }; }; ?>
   <span class="user-info"><small>Selamat Datang</small><?php echo $this->session->userdata('username');?></span>
  <i class="ace-icon fa fa-caret-down"></i></a>
 <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
 <li><a href="<?php echo base_url();?>ubah_password" ><i class="ace-icon fa fa-cog"></i>Ubah Password</a></li>
 

<!--  <li>
<a href="profile.html">
<i class="ace-icon fa fa-user"></i>
Profile
</a>
</li> -->
<li class="divider"></li>
 <li>
  <a href="<?php echo base_url('login/logout'); ?>">
  <i class="ace-icon fa fa-power-off"></i>Logout
  </a>
   </li>
  </ul>
 </li>
</ul>
    </div>
  </div><!-- /.navbar-container -->
</div>