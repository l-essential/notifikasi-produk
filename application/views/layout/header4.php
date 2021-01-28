<div class="navbar-container" id="navbar-container">
<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
  <span class="sr-only">Toggle sidebar</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
<div class="navbar-header pull-left">
 <a href="<?php echo base_url('dashboard') ?>" class="navbar-brand">
<small><img src="<?php echo base_url();?>assets/ico/icon3.png">PT. L'ESSENTIAL HOLDING</small></a>
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
<div class="navbar-buttons navbar-header pull-right" role="navigation">
<ul class="nav ace-nav"> 
<?php if($akses_edit->c == 1){ ?>
<li class="purple">
<a data-toggle="dropdown" class="dropdown-toggle" href="#">
<i class="ace-icon fa fa-bell icon-animated-bell"></i>
<span class="badge badge-important"><!-- <?php echo count($jumlah_kontrak); ?> --></span>
</a>
<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
<li class="dropdown-header">
<i class="ace-icon fa fa-exclamation-triangle"></i><?php print_r($url_sub); ?>
<!-- <?php echo count($jumlah_kontrak); ?> --> Order Sticker
</li>
<li class="dropdown-content">
<ul class="dropdown-menu dropdown-navbar navbar-pink">
<!-- <?php foreach($jumlah_kontrak as $jumlah_kontrak){ ?> -->
<li>
<a href="<?php echo base_url('transaksi_hrd/status_karyawan/tambah_tampil/'.$jumlah_kontrak->NIK) ?>" class="clearfix">
<!-- <?php if($jumlah_kontrak->foto != ""){ ?> -->
  <img src="<?php echo base_url('assets/upload/foto/thumbs/'.$jumlah_kontrak->foto); ?>" class="msg-photo" />
  <!-- <?php }else{ ?> -->
  <img src="<?php echo base_url('assets/upload/foto/thumbs/foto.jpg'); ?>" class="msg-photo" />
  <!-- <?php }; ?> -->
  <span class="msg-body">
    <span class="msg-title">
      <span class="blue"><?php echo $jumlah_kontrak->namaKaryawan; ?></span>
      <!-- Ciao sociis natoque penatibus et auctor ... -->
    </span>
    <span class="msg-time">
      <i class="ace-icon fa fa-clock-o"></i>
      <span><!-- <?php echo $jumlah_kontrak->selisih; ?> --> Hari Lagi</span>
    </span>
  </span>
</a>
</li>
<!-- <?php }; ?> -->
</ul>
</li>
<li class="dropdown-footer">
      <a href="<?php echo base_url('transaksi_hrd/status_karyawan/akan_habis_kontrak'); ?>">
        Lihat Semua Data
        <i class="ace-icon fa fa-arrow-right"></i>
      </a>
    </li>
  </ul>
</li>     
<li class="green">
  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
    <i class="ace-icon fa fa-bell"></i>
    <span class="badge badge-success"><!-- <?php echo count($jumlah_harian); ?> --></span>
  </a>
  <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
    <li class="dropdown-header">
      <i class="ace-icon fa fa-user"></i><!-- <?php echo count($jumlah_harian); ?> -->Sticker Selesai
    </li>
    <li class="dropdown-content">
      <ul class="dropdown-menu dropdown-navbar">
      <!-- <?php foreach($jumlah_harian as $jumlah_harian){ ?> -->
        <li>
          <a href="<?php echo base_url('transaksi_hrd/status_karyawan/tambah_tampil/'.$jumlah_harian->NIK) ?>" class="clearfix">
          <!-- <?php if($jumlah_harian->foto != ""){ ?> -->
            <img src="<?php echo base_url('assets/upload/foto/thumbs/'.$jumlah_harian->foto); ?>" class="msg-photo" />
            <!-- <?php }else{ ?> -->
            <img src="<?php echo base_url('assets/upload/foto/thumbs/foto.jpg'); ?>" class="msg-photo" />
              <!-- <?php }; ?> -->
            <span class="msg-body">
              <span class="msg-title">
                <span class="blue"><!-- <?php echo $jumlah_harian->namaKaryawan; ?> --></span>
              </span>
              <span class="msg-time">
                <i class="ace-icon fa fa-clock-o"></i>
                <span><!-- <?php echo $jumlah_harian->selisih; ?> --> Hari Lagi</span>
              </span>
            </span>
          </a>
        </li>
        <!-- <?php }; ?> -->
      </ul>
    </li>
    <li class="dropdown-footer">
      <a href="<?php echo base_url('transaksi_hrd/status_karyawan/akan_habis_harian'); ?>">
        LIhat Semua Data
        <i class="ace-icon fa fa-arrow-right"></i>
      </a>
    </li>
  </ul>
</li>
<?php }; ?>
  <li class="light-blue">
   <a data-toggle="dropdown" href="#" class="dropdown-toggle">
   <?php 
   $baseurl = "http://192.168.0.252/lessential"; 
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