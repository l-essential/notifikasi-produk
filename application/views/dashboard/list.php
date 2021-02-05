<?php 
$NIK        = $this->session->userdata('NIK');
?>
<div class="page-header">
  <h1>
    Dashboard 
  </h1>
</div><!-- /.page-header -->
<div class="alert alert-block alert-success">
<button type="button" class="close" data-dismiss="alert">
  <i class="ace-icon fa fa-times"></i>
</button>
<p style="text-transform:uppercase">Selamat Datang <?= $this->session->userdata('username'); ?> <i class="ace-icon fa fa-smile-o  fa-lg green"></i></p>
<strong class="green">
 
</strong>
</div>


